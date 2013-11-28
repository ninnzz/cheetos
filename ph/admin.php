<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ReliefBoard - get help, give help during calamities</title>

    <!-- CSS CODE -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/admin.css" rel="stylesheet" />
    <link href="js/select2/select2.css" rel="stylesheet"/>
 
  </head>

  <!-- START BODY -->
  <body>

    <!-- START - FIXED NAV -->
    <div id="nav-container" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      
      <div class="container">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a id="logo" class="navbar-brand" href="/" title="ReliefBoard"></a>
        </div>

        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav navbar-right">
             <li style="font-size:20px;padding:10px">ADMIN</li>
             <li style="padding-top:15px"><span class="glyphicon glyphicon-chevron-down"></span></li>
          </ul>
        </nav>

      </div>

    </div>
    <!-- END - FIXED NAV -->

    <!-- START BODY-->
    <div class="container">
      
      <!-- START MESSAGE LIST-->
      <div class="col-lg-4 col-md-4" id="message-list">
        
        <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
        <hr/>
        <!-- REMOVE THIS : CONVERT TO TEMPLATE-->
        <div id="message-list-messages">
        </div>
        <div id="load_more" class="row text-center text-danger" >
          Load More
        </div>
        <!-- REMOVE THIS : END OF TEMPLATE -->

      </div>
      <!-- END MESSAGE LIST-->
      
      <!--START CHAT BOX-->
      <div class="col-lg-8 col-md-8" id="chat-box">
        <div id="conversation">

        </div>
        <div id="message-input">
          <textarea id="form-message"  placeholder="Write your message..." class="form-control" required></textarea>
          <button id="send" type="button" class="btn btn-primary">SEND</button>
        </div>

        <input placeholder="Add Tags" type="hidden" id="tagSelect" class="tagSelect_dummy" style="width:98%"/> 

      </div>
      <!--END CHAT BOX-->
      

    </div>    
    <!-- END DIV BODY-->

  <div class="modal fade" id="respond_error">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body">
          <p>Response is required</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/underscore.min.js"></script>
  <script src="js/select2/select2.js"></script>

  <!--Template for messages on the left side-->
  <script type="text/template" id="message_template">
    <% 
    _.each( messages, function(m) {
      messages_array[m.id] = m;
    %>
     <div class="message" data-id="<%=m.id%>">
        <h4 class="pull-left"><b><%=convertToLinks(unescape(unescape(decodeURIComponent(unescape(m.sender)))))%></b></h4>
        <h6 class="pull-right"><%=timeConverter(m.date_updated)%></h6>
        <br/><br/>
        <p>
          <%=convertToLinks(unescape(unescape(decodeURIComponent(unescape(m.message))))) %>
        </p>
      
    </div>   
    <%
    
    });
    %>

  </script> <!--End of message_template-->

  <!--Template for message expanded on the right side-->  
  <script type="text/template" id="message_expanded_template">

  <% 
  _.each( comments, function(c) {
    
    if(c.parent_id == null){
  %>
     <div class="expanded-message-left">
     <%
     }
     else{
     %>
      <div class="expanded-message-right">
     <% 
     }
     %>
        <h4><b><%=convertToLinks(unescape(unescape(decodeURIComponent(unescape(c.sender)))))%></b></h4>
        <p>
          <%=convertToLinks(unescape(unescape(decodeURIComponent(unescape(c.message))))) %>
        </p>
        <h6 ><%=timeConverter(c.date_updated)%></h6>
        <hr/>
      </div>  
  <%
   
  });
  %>
  </script> <!--End of message_expanded_template-->

  <script>
  var app_id= "2b198w.reliefboard.web";
  var offset = 0;
  var offset_message_expanded = 0;
  var messages_array = [];
  var first_message = "";
  var current_message = "";
  var is_search_mode = false;

  //Load messages on the left side
  function load_messages(){
      $.ajax({
        type: "GET",
        url: "http://www.reliefboard.com/messages/feed?offset=" + offset +"&limit=5"
      }).done( function ( result ) {
        var html = _.template( document.getElementById('message_template').innerHTML , {messages:result.data.result} );
        if(offset == 0 ){
          document.getElementById('message-list-messages').innerHTML = html;
          first_message = result.data.result[0];
          current_message = first_message;
          var html = _.template(  document.getElementById('message_expanded_template').innerHTML , {comments:[first_message]} );
          document.getElementById("conversation").innerHTML = html;
        }
        else{
          $("#message-list-messages").append(html);    
        }

      });
  }

  //Load the message comments
  function load_message_expanded(message_id){
      $.ajax({
        type: "GET",
        url: "http://www.reliefboard.com/comments?parent_id=" + message_id  + "&limit=10&offset=" + offset_message_expanded
      }).done( function ( result ) {
        console.log(result);
        if(result.data.result.length > 0){
          var html = _.template(  document.getElementById('message_expanded_template').innerHTML , {comments:result.data.result} );
          document.getElementById('conversation').innerHTML = document.getElementById('conversation').innerHTML + html;    
        }

      });
  }

  //Send comment
  function post_comment(message_id, message){
    $.ajax( {
        type: "POST",
        data: {app_id : app_id, message: message, name: "Admin", parent_id: message_id},
        url: "http://www.reliefboard.com/messages/feed",
      } ).done( function ( result ) {
          $("#form-message").val('');
          var append_message = {"message": message, "sender" : "Admin", "date_updated": (new Date).getTime(), "parent_id": "null"};
          var html = _.template(  document.getElementById('message_expanded_template').innerHTML , {comments:[append_message]} );
          document.getElementById('conversation').innerHTML = document.getElementById('conversation').innerHTML + html;    
      });
  }

  //Search for certain messages
  function search(keyword){
    $.ajax( {
      type: "GET",
      url: "http://www.reliefboard.com/search?query=" + keyword+"&offset=" + offset+"&limit=5&name=1&loc=1&message=1"
    } ).done( function ( result ) {
      console.log(offset);
      var html = _.template( $("#message_template").html() , {messages:result.data.result} );
      if(offset == 0 ){
        document.getElementById('message-list-messages').innerHTML = html;
        first_message = result.data.result[0];
        current_message = first_message;
        var html = _.template( document.getElementById('message_expanded_template').innerHTML , {comments:[first_message]} );
        document.getElementById("conversation").innerHTML = html;
      }
      else{
        $("#message-list-messages").append(html);      
      }
    });
  }

  //Load more clicked
  $(document).on("click","#load_more", function(e) {
    offset = offset + 5;
    if(is_search_mode){
      var keyword = document.getElementById("search").value;
      search(keyword);
    }else{
      load_messages();
    } 
  });

  // Message from the left side clicked to view comments
  $(document).on("click",".message", function(e) {
    var id= $(this).attr('data-id'); 
    if(typeof messages_array[id] != undefined){
      var html = _.template( $("#message_expanded_template").html() , {comments:[messages_array[id]]} );
      current_message = messages_array[id];
    }
    document.getElementById("conversation").innerHTML = html;
    load_message_expanded(id);
  });

  // Send button clicked, for sending reply
  $(document).on("click","#send", function(e) {   
    if(document.getElementById("form-message").value == ""){
      $("#respond_error").modal('show');
    }
    else{
      post_comment(current_message.id,document.getElementById("form-message").value );
    }
  });

  // capture enter on search input
  $(document).on("keypress","#search", function(e) {   

    if(e.charCode ==13){
      is_search_mode = true;
      offset = 0;
      var keyword = document.getElementById("search").value;
      search(keyword);
    }

  });

  // trigger if search input is empty
  $(document).on("keyup","#search", function(e) {   
    if((document.getElementById('search').value== "") && (is_search_mode == true)){
      offset = 0;
      is_search_mode = false;
      load_messages();
    }
  });

  // load messages on load
  $(document).ready(function(){
    load_messages();
    $("#tagSelect").select2({tags:["DSWD", "Red Cross", "PNP"]});
  });
  
  </script> <!--End of script-->
  </body>
  <!-- END BODY -->

</html>

