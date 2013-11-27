<!DOCTYPE html>
<html lang="en">

  <head>

    <title>ReliefBoard - get help, give help during calamities</title>

    <!-- CSS CODE -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/admin.css" rel="stylesheet" />
 
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
          <!-- REMOVE THIS : CONVERT TO TEMPLATE-->
          <div id="expanded-message-left">
            <h4><b>Kristela Mae-Joy Valentin</b></h4>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
              been the industry's standard dummy text ever since the 1500s...
            </p>
            <h6 style="text-align:right">10:30pm</h6>
            <hr/>
          </div>
          <div id="expanded-message-right">
            <h4 style="text-align:right"><b>ADMIN</b></h4>
            <p style="text-align:right">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
              been the industry's standard dummy text ever since the 1500s...
            </p>
            <h6 style="text-align:left">11:30pm</h6>
            <hr/>
          </div>
          <!-- REMOVE THIS : END OF TEMPLATE -->
        </div>
        <div id="message-input">
          <textarea id="form-message" placeholder="Write your message..." class="form-control" required></textarea>
          <button id="send" type="button" class="btn btn-primary">SEND</button>
        </div>

      </div>
      <!--END CHAT BOX-->
      

    </div>    
    <!-- END DIV BODY-->
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/underscore.min.js"></script>
  <script>
  function convertToLinks(text) {
    var replaceText, replacePattern1;
     
    //URLs starting with http://, https://
    replacePattern1 = /(\b(https?):\/\/[-A-Z0-9+&amp;@#\/%?=~_|!:,.;]*[-A-Z0-9+&amp;@#\/%=~_|])/ig;
    replacedText = text.replace(replacePattern1, '<a class="colored-link-1" title="$1" href="$1" target="_blank">$1</a>');
     
    //URLs starting with "www."
    replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
    replacedText = replacedText.replace(replacePattern2, '$1<a class="colored-link-1" href="http://$2" target="_blank">$2</a>');
     
    //returns the text result
     
    return replacedText;
  }
  function timeConverter(UNIX_timestamp){
     var a = new Date(UNIX_timestamp*1000);
     var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
     var year = a.getFullYear();
     var month = months[a.getMonth()];
     var date = a.getDate();
     var hour = a.getHours();
     if(hour > 12){
      hour = hour-12;
      var ampm = 'pm';
     }else{
      var ampm = 'am';
     }

     var min = a.getMinutes();
     var sec = a.getSeconds();
     var time = date+','+month+' '+year+' '+hour+':'+min+':'+sec + " "+ ampm;
     return time;
  }
  </script>
  <script type="text/template" id="message_template">
    <% 
    _.each( messages, function(m) {
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

  </script>   
  <script type="text/template" id="message_expanded_template">

  <% 
  _.each( comments, function(c) {
  %>
   <div id="expanded-message-left">
      <h4><b>Kristela Mae-Joy Valentin</b></h4>
      <p>
      
      </p>
      <h6 style="text-align:right">10:30pm</h6>
      <hr/>
    </div>  
  <%
   
  });
  %>


  </script>   
  <script>
  var offset = 0;
  var offset_message_expanded = 0;
  
  function load_messages(){
      $.ajax({
        type: "GET",
        url: "http://www.reliefboard.com/messages/feed?offset=" + offset +"&limit=5"
      }).done( function ( result ) {
        var html = _.template( $("#message_template").html() , {messages:result.data.result} );
        if(offset == 0 ){
          document.getElementById('message-list-messages').innerHTML = html;
        }
        else{
          document.getElementById('message-list-messages').innerHTML = document.getElementById('message-list-messages').innerHTML  + html;
        }
      });
  }

  function load_message_expanded(message_id){
      $.ajax({
        type: "GET",
        url: "http://www.reliefboard.com/comments?parent_id=" + message_id  + "&limit=10&offset=" + offset_message_expanded
      }).done( function ( result ) {
        if(result.data.length > 0){
          var html = _.template( $("#message_expanded_template").html() , {comments:result.data.result} );
          document.getElementById('conversation').innerHTML = html; 
           
        }
        else{
          document.getElementById('conversation').innerHTML = "<div>Does not have any comment</div>"; 
        }
      
      });
  }


  $(document).on("click","#load_more", function(e) {
    offset = offset + 5;
    load_messages();
  });


  $(document).on("click",".message", function(e) {
    var id= $(this).attr('data-id');
    load_message_expanded(id);
  });

  load_messages();

  </script>
  </body>
  <!-- END BODY -->

</html>

