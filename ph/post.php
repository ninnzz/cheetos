<?php
  $id = $_GET['id'];
  $data = file_get_contents( "http://reliefboard.com/messages/feed_item?message_id=" . $id );
  $data = json_decode($data, true);
  $error = false;
  if(!isset($data['data']['result']['0']))
    $error = true;
  else
    $data = $data['data']['result']['0'];

  function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1') 
  {
    //create the URL
    $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
    //get the url
    //could also use cURL here
    $response = file_get_contents($bitly);
    
    //parse depending on desired format
    if(strtolower($format) == 'json')
    {
      $json = @json_decode($response,true);
      return $json['results'][$url]['shortUrl'];
    }
    else //xml
    {
      $xml = simplexml_load_string($response);
      return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
    }
  }

  $url = "http://www.reliefboard.com/ph/post.php?id=". $id;
  $bitly = make_bitly_url($url,'kjventura','R_afc197795cfaf9242fc1063b2c77c48d','json');

?>
<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

  <head prefix="og: http://ogp.me/ns/website#">

    <title>ReliefBoard - get help, give help during calamities</title>

    <!-- META -->
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- META COPY FOR SEO -->
    <meta name="description" 
          content="<?php echo urldecode(urldecode($data['message'])); ?>">

    <?php include_once("header.php");?>
    <meta property="og:description" 
          content="<?php echo urldecode(urldecode($data['message'])); ?>">

    <!-- GOOGLE ANALYTICS -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-45702678-1', 'reliefboard.com');
      ga('send', 'pageview');

    </script>

    <!-- FONTS -->
    <script type="text/javascript" src="//use.typekit.net/qcx1ndo.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- CSS CODE -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/build.css" rel="stylesheet" />
    <link href="css/post.css" rel="stylesheet" />
    <link href="js/select2/select2.css" rel="stylesheet"/>

  </head>

  <body>

    <h1 style="display: none;">ReliefBoard</h1>

    <!-- START - SOCIAL NETWORK SCRIPTS -->

    <!--FACEBOOK -->
    <div id="fb-root"></div>
    <script> 
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214855112027480";
        fjs.parentNode.insertBefore(js, fjs);
      } (document, 'script', 'facebook-jssdk'));


      window.fbAsyncInit = function() {
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
              logged_in_style();
            } else if (response.status === 'not_authorized') {

               $("#label_comment_message").html('Please authorize Reliefboard');
            } else {
              
              $("#add_tag").css("display", "block");
              $("#tags_only").css("display", "block");
              $("#label_comment_message").html('Login to respond');
            }
          });
      };
    </script>

    <!--TWITTER -->
    <script>
      !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    </script>

    <!-- END - SOCIAL NETWORK SCRIPTS -->

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
          <ul class="nav navbar-nav navbar-left">
            <li> <a href="about.php">About</a></li>
          </ul>
        </nav>
<!--         <div class="navbar-collapse collapse navbar-right">
          
          <div id="search-container">
            <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
          </div>

        </div> -->
      
      </div>

    </div>

    <!-- END - FIXED NAV -->

    <?php if($error): ?>

      <div class="container">
        <div class="row">
          <div id="copy" class="col-lg-5">
            <h1>404 Not Found</h1>
          </div>
        </div>
      </div>

    <?php else: ?>

      <div class="container">
        <div id="search-copy-container" class="col-md-12" style=" margin: 10px 0;">
          <button id="back-to-feed" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back to Feeds</button>
          
        </div>
        <div id="msg-single" class="col-lg-7">

          <div class="post" data-id="<?php echo $data['id']; ?>">
            
              <div class="time-container">
                <div class="time-asset"></div>
                <div class="time-data"><span class="times" data-time="<?php echo $data['date_created']; ?>"></span></div>
              </div>

              <p class="msg-data">
                
                <p id="msg-message"><?php echo urldecode(urldecode($data['message'])); ?></p>
  
                <?php if( $data['sender'] != null || $data['sender'] != "" ) { ?>
                  <b><span class="glyphicon glyphicon-user"></span> <?php echo urldecode(urldecode($data['sender'])); ?> 
                <?php } ?>

                <?php if( $data['place_tag'] != null || $data['place_tag'] != "" ) { ?>
                  | <span class="glyphicon glyphicon-map-marker"></span> <?php echo urldecode(urldecode($data['place_tag'])); ?></b>
                <?php } ?>

              </p>

              <div style="text-align:right">
                <input placeholder="Add Tags" type="hidden" id="tagSelect" class="tagSelect_dummy" style="width:300px; display: none" /><br /> 
                <div id="tags_only" style="display:none">
                <?php
                if(($data['tags']!=null) && ($data['tags']!= "")){
                  $tags = explode(",", $data['tags']);
                  $tags_count = count($tags);
                  for ($i=0; $i < $tags_count; $i++) { 
                    echo "<a href='search.php?keyword=".$tags[$i]."'>#" . $tags[$i] . " </a>";
                  }
                }
                ?>
                </div>
                <div id="add_tag" class="btn btn-warning btn-primary pull-right"  style="display:none;">Login to add tags</div>  
              </div>
              <br/>
              
              <div class="share-container">
                  <br />
                  <div class="social-item">
                    <div class="fb-share-button" data-href="http://www.reliefboard.com/ph/post.php?id=<?php echo $id; ?>" data-type="button_count"></div>
                  </div>
                 
                  <div class="social-item">
                    <a id="tw" href="https://twitter.com/share" data-url="<?php echo $bitly; ?>" data-text="<?php echo urldecode(urldecode($data['message'])); ?> - <?php echo urldecode(urldecode($data['place_tag'])); ?> - <?php echo urldecode(urldecode($data['sender'])); ?> - #reliefboard VIA reliefboard.com" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                      Tweet
                    </a>
                </div>
                 <br /><br/>
              </div>

          </div>

          <div class="post comments-container" data-id="<?php echo $data['id']; ?>">
              
              <div class="time-container">
                <div class="time-asset"></div>
                <div class="time-data">Responses</div>

                <div class="msg-data">
                  <br />
                  <!-- <div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]; ?>" data-numposts="100"></div> -->
                  <br />
                  <div class="comment-highlight">
                    <div class="form-group">
                      <label for="comment_message" id="label_comment_message">Login to respond</label>
                      <textarea class="form-control" rows="3" id="comment_message" ></textarea>
                    </div>
                    <div type="button" required="true" class="btn btn-danger" id="comment_via_web">Post</div>
                    <div  class="pull-right" id="posting_loader" >Posting....</div>
                  </div>
                </div> 
                
              </div>

          </div>

        </div>

      </div>

    <?php endif; ?>

    <script type="text/template" id="post">
      <% if( d.message != null && d.message != "" ) { %>
      <div class="comment-post<%= d.id %> comment-post" data-id="<%= d.id %>">
          
          <div class="comment-data">
                
            <% if( d.sender != null ) { %>
              <b><span class="glyphicon glyphicon-user"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.sender)))) %> 
            <% } %>

            <% if( d.place_tag != null ) { %>
              | <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.place_tag)))) %></b>
            <% }%>
            
            : <%= convertToLinks(unescape(unescape(decodeURIComponent(unescape(d.message))))) %>

          </div>

          <div class="from-app" style="padding: 15px 0px 0px 0px;">
            <% if(d.source != null ) { %>
              <% if(d.source.indexOf("reliefboard") !== -1 || d.source.indexOf("primary") !== -1) { %>
                
                <img src="img/profile-pic-16.png" width='20'/>
                <span class="app-name"><span class=""></span> Web</span>

              <% } else if(d.source.indexOf("sms") !== -1) { %>

                <img src="img/profile-pic-16.png" width='20' />
                <span class="app-name"><span class=""></span> SMS</span>

              <% } else if(d.app_name)  { %>
                
                <% if(d.logo != "") { %>
                  <img src="<%= d.logo %>" width='20' />
                <% } %>

                  <span class="app-name"><%= d.app_name %></span>

              <% } %>
            <% } %>
          </div>

          <span class="times" data-time="<?php echo $data['date_created']; ?>"></span>

        </div>
        <% } %>
    </script>
    <script type="text/template" id="tags">
      <% if( d.tags != null && d.message != "" ) { %>
      <div class="comment-post<%= d.id %> comment-post" data-id="<%= d.id %>">
          
          <div class="comment-data">
                
            <% if( d.sender != null ) { %>
              <b><span class="glyphicon glyphicon-user"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.sender)))) %> 
            <% } %>

            <% if( d.place_tag != null ) { %>
              | <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.place_tag)))) %></b>
            <% }%>
            
            : <%= convertToLinks(unescape(unescape(decodeURIComponent(unescape(d.message))))) %>

          </div>

          <div class="from-app" style="padding: 15px 0px 0px 0px;">
            <% if(d.source != null ) { %>
              <% if(d.source.indexOf("reliefboard") !== -1 || d.source.indexOf("primary") !== -1) { %>
                
                <img src="img/profile-pic-16.png" width='20' />
                <span class="app-name"><span class=""></span> Web</span>

              <% } else if(d.source.indexOf("sms") !== -1) { %>

                <img src="img/profile-pic-16.png" width='20' />
                <span class="app-name"><span class=""></span> SMS</span>

              <% } else if(d.app_name)  { %>
                
                <% if(d.logo != "") { %>
                  <img src="<%= d.logo %>" width='20' />
                <% } %>

                  <span class="app-name"><%= d.app_name %></span>

              <% } %>
            <% } %>
          </div>

          <span class="times" data-time="<?php echo $data['date_created']; ?>"></span>

        </div>
        <% } %>
    </script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/underscore.min.js"></script>
    <script src="js/time.js"></script>
    <script src="js/select2/select2.js"></script>

    <script type="text/javascript">
      var message_id = $(".comments-container").attr('data-id');
      var html = "";
      var app_id= "2b198w.reliefboard.web";
      var commenting = false;
      var authorized_tagging = false;
      

      //copied from build.js
      function post_template (d) {
        var html = _.template( $("#post").html() , {d:d} );
        return html;
      }
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
      $( function () {

        $(".times").prettyDate();

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
          
        $("#msg-message").html(convertToLinks($("#msg-message").text()));

        $.ajax( {
          type: "GET",
          url: "http://www.reliefboard.com/comments?offset=0&limit=10&parent_id=" + message_id
        } ).done( function ( result ) {
            _.each( result.data.result, function(d) {
                html = html + post_template(d);
            });
           
            $(".comments-container .msg-data ").append(html);
            $(".times").prettyDate();
           
        });// end of ajax

      });

      function post_comment(){
        loading_show();
        FB.api('/me', function(response) {
            var name = response.first_name + " "+ response.last_name;
            var message = $("#comment_message").val();
            $.ajax( {
              type: "POST",
              data: {app_id : app_id, message: message, name: name, parent_id: message_id},
              url: "http://www.reliefboard.com/messages/feed",
            } ).done( function ( result ) {
           
              var post_success = {'message': message, sender: name , source: app_id};
              var html_to_insert = post_template(post_success);
              $( html_to_insert).insertAfter( ".comment-highlight" );
              $("#comment_message").val('')
              loading_hide();
            });
          });
      }


      //will transfer this 
      $(document).on("click","#comment_via_web", function(e) {
        
        if(commenting == false){

          e.preventDefault();

          FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
              // the user is logged in and has authenticated your
              // app, and response.authResponse supplies
              // the user's ID, a valid access token, a signed
              // request, and the time the access token 
              // and signed request each expire
              var uid = response.authResponse.userID;
              var accessToken = response.authResponse.accessToken;
              logged_in_style();
              post_comment();
            } else if (response.status === 'not_authorized') {
            // the user is logged in to Facebook, 
            // but has not authenticated your app
            } else {
              FB.login(function(response) {
                
                if(response.status === 'connected'){
                  logged_in_style();
                  post_comment();
                }
              },{scope: 'email'}); 
            }
          });

          FB.Event.subscribe('auth.authResponseChange', function(response) {
          // Here we specify what we do with the response anytime this event occurs. 
            if (response.status === 'connected') {
              // The response object is returned with a status field that lets the app know the current
              // login status of the person. In this case, we're handling the situation where they 
              // have logged in to the app.
             
            }
          });

        }
        
       // $("#viawebModal").modal("show");
        

      }); // end of #comment_via_web click
      
      //will transfer this 
      $(document).on("click","#add_tag", function(e) {
          FB.login(function(response) {
                
          },{scope: 'email'}); 

          FB.Event.subscribe('auth.authResponseChange', function(response) {
          // Here we specify what we do with the response anytime this event occurs. 
            if (response.status === 'connected') {
              logged_in_style();
            }
          });


      }); // end of #comment_via_web click

      $(document).on("click","#back-to-feed",function(e) {
        e.preventDefault();
        window.location = "/";
      });


      function loading_hide(){
        $("#posting_loader").css("display", "none");
        $("#comment_message").prop('disabled',false);
        commenting = false;
        
      }

      function loading_show(){
        $("#posting_loader").css("display", "block");
        $("#comment_message").attr('disabled', 'true');
        commenting = true;
      }

      function get_tags(){
        $.ajax( {
          type: "GET",
          url: "http://reliefboard.com/tag?post_id=" + message_id,
        } ).done( function ( result ) {
          if(result.data.tag_count <= 0){
            $('#tagSelect').select2({ tags:result.data.tags});
          }
          else{
            var tags =result.data.tags.join(",");
            
            $("#tagSelect").val(tags);
            $('#tagSelect').select2({ tags:result.data.tags});
            
            //$("#tagSelect").select2();
          }
          //console.log(tags);
          //$('#tagSelect').select2({ tags: ["red", "green", "blue"] });
        });
      }

      $(document).on("change","#tagSelect", function(e) {
        add_tags();
      }); // end of #comment_via_web click

      function add_tags(){
        
          $.ajax( {
            type: "PUT",
            data: {app_id: app_id, post_id: message_id, tags: $("#tagSelect").val()},
            url: "http://reliefboard.com/tag",
          } ).done( function ( result ) {
            
          });
      }
      
      function logged_in_style(){
        $("#add_tag").css("display", "none");
        $("#tags_only").css("display", "none");
        $(".tagSelect_dummy").css("display", "inline-block");
        FB.api('/me', function(response) {
          $("#label_comment_message").html('Post as ' + response.first_name + " " + response.last_name);
        });
      }
      get_tags();

      
       
      
    </script>

    <!-- END BODY -->

  </body>

</html>