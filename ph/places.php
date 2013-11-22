<?php
  $keyword = $_GET['keyword'];
  if(!isset($keyword))
    $error = true;


?>
<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" >

  <head prefix="og: http://ogp.me/ns/website#" >

    <title>ReliefBoard</title>

    <!-- META -->
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- META COPY FOR SEO -->
    <meta name="description" content="Need help? Looking for someone? Want to share information? We help you get the word out." />

    <meta property="og:title" content="ReliefBoard" />
    <meta property="og:site_name" content="ReliefBoard" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.reliefboard.com/ph/img/profile-pic-205.jpg" />
    <meta property="og:url" content="http://www.reliefboard.com" />
    <meta property="og:description" "Need help? Looking for someone? Want to share information? We help you get the word out." />

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
    <link href="css/select2.css" rel="stylesheet" />
    <link href="css/select2-bootstrap.css" rel="stylesheet" />
    <link href="css/build.css" rel="stylesheet" />


  </head>

  <body>

    <h1 style="display: none;">ReliefBoard</h1>
    <!-- START - SOCIAL NETWORK SCRIPTS -->

    
    <!-- FACEBOOK -->
    <div id="fb-root"></div>
    <script> 
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214855112027480";
        fjs.parentNode.insertBefore(js, fjs);
      } (document, 'script', 'facebook-jssdk'));
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
      
      
      </div>

    </div>

    <!-- END - FIXED NAV -->

    <!-- START BODY -->
    <?php if($error){?>
       <div  class="container">

        <div class="row">
          <div class="col-md-12 text-center"><h1> Keyword not provided</h1></div>
          
        </div>

      </div>
    <?php }else{ ?>
    <div id="main-container" class="container" data-keyword="<?php echo $keyword;?>">

      <div class="row">
        <div id="search-copy-container" class="col-md-12" style=" margin: 10px 0;">
          <button id="back-to-feed" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back to Feeds</button>
          
        </div>
        <div id="copy-container"  class="col-md-12" style=" margin: 10px 0;">
          <div id="copy"  class="col-md-12 text-center" id="title_search" >
            <h2 style="font-weight: 800; font-size: 46px; margin-top: -1px; color: #1d2f43; text-transform:capitalize;"><?php echo $keyword;?></h2>
          </div>
          
        
        </div>


        <div class="col-lg-10" id="msg-single">
          <div id="notif-container">
            <a href="#" class="notif" title="Click to Show">There are <span id="count"></span> new post(s). Click to Show.</a>
          </div> 
          <div id="results"></div>
        </div>

      </div>


      <div class="row">

      </div>

    </div>
    <?php }?>
    <!-- Modal -->
<!--     <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div id="fb"class="fb-like" data-href="" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div id="tw-container"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
          </div>
        </div>
      </div>
    </div>
 -->

    <div class="modal fade" id="viawebModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div id="loginToFacebook" class="modal-body">
            <b>Login with Facebook to Start Posting to ReliefBoard</b> <br /> <br />
            <div class="fb-login-button" data-scope="email" data-width="200" show-faces=true></div>
          </div>

          <div id="authenticated" class="modal-body" style="display: none;">
            <b>Your Name: <span id="authenticated-name"></span> <span style="color: gray !important;">(Facebook)</span> </b>
            <br /><br />
            <b>Details: </b>
            <br /><br />
            <input id="form-location" class="form-control" type="text" placeholder="Location - Where is help needed?" />
            <br />
            <textarea id="form-message" placeholder="Message - Please be as specific as possible about the concerned people, places, and contact information" class="form-control"></textarea>
            <br />
            <input id="form-mobile-number" class="form-control" type="text" placeholder="Mobile number (Optional)" />
<!--             <br />
              <input id="form-tags" type="hidden" class="form-control" placeholder=""> -->
            <br /><br />
            <button id="viawebSend" type="button" class="btn btn-primary">Post to ReliefBoard.com</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/templ" id="twTemplate">
      <a id="tw" href="https://twitter.com/share"  data-text="" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">Tweet</a>
    </script>

    <script type="text/javascript">
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
    </script>

    <script type="text/javascript">
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
    </script>

    <script type="text/template" id="post">
      <% if( d.message != null && d.message != "" ) { %>
      
      <div class="time-container<%= d.id %> time-container">
        <div class="time-asset"></div>
        <div class="time-data"><span class="time" data-time="<%= d.date_created %>"></span></div>
        <!--<div class="status-data"><span class="status-pending">PENDING</span></div>-->
      </div>

      <div class="post<%= d.id %> post" data-id="<%= d.id %>">
          <div class="pull-right">
            <a class="share" target="_blank" data-id="<%= d.id %>" href="#" style="color:#b65656;">Mark as Spam</a>
          </div>

          <p class="msg-data">  
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
            
            <br/><br/>
            
            <%= convertToLinks(unescape(unescape(decodeURIComponent(unescape(d.message))))) %>
            <br/><br/>  
            <% if( d.sender != null ) { %>
              <b><span class="glyphicon glyphicon-user"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.sender)))) %> 
            <% } %>

            <% if( d.place_tag != null ) { %>
              | <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.place_tag)))) %></b>
            <% }%>
        
          </p>

          <hr/> 
          <div class="share-container">
            <a class="help" href="http://www.reliefboard.com/ph/post.php?id=<%= d.id %>" title="View comments and share this message" target="_blank">HELP</a> 
            <!--&nbsp;&nbsp;YOU and 3 people are helping-->
            <div class="pull-right">
              <div class="social-item">
                <div id="fb"class="fb-like" data-href="http://www.reliefboard.com/ph/post.php?id=<%= d.id %>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
              </div>  
              <div class="social-item">
                <div class="fb-share-button" data-href="http://www.reliefboard.com/ph/post.php?id=<%= d.id %>" data-type="button_count"></div>
              </div>
              <div class="social-item">
                <a id="tw" href="https://twitter.com/share" data-url="http://www.reliefboard.com/ph/post.php?id=<%= d.id %>" data-text="<%= unescape(unescape(decodeURIComponent(unescape(d.message)))) %>" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                  Tweet
                </a>
              </div>
            </div>
          </div>          
        </div>
        <% } %>
    </script>



    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/underscore.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/time.js"></script>

    <!--USER REPORT-->
    <script type="text/javascript">
    var _urq = _urq || [];
    _urq.push(['initSite', '1f196460-25b0-43a0-b053-b084411a9d69']);
    (function() {
    var ur = document.createElement('script'); ur.type = 'text/javascript'; ur.async = true;
    ur.src = ('https:' == document.location.protocol ? 'https://cdn.userreport.com/userreport.js' : 'http://cdn.userreport.com/userreport.js');
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ur, s);
    })();
    </script>


    <script>
      var offset = 0;
      var keyword = $("#main-container").attr("data-keyword");



      function post_template (d) {
        var html = _.template( $("#post").html() , {d:d} );
        return html;
      }

      function search(){
        $.ajax( {
          type: "GET",
          url: "http://www.reliefboard.com/search?query=" + keyword+"&offset=" + offset+"&limit=5&name=1&loc=1&message=1"
        } ).done( function ( result ) {

          var html = "";
          var title = $("title").text();
          title = title.replace(/\([1-9][0-9]{0,2}\)/g, '');

          _.each( result.data.result, function(d) {

              html = html + post_template(d);

          });
          $( "#results" ).append( html );
          $( "#results" ).css('display', 'block');
          $( ".time" ).prettyDate();
          
          $.getScript('http://platform.twitter.com/widgets.js');
          FB.XFBML.parse();
        });
      } 

      $(document).on("click","#back-to-feed",function(e) {
        e.preventDefault();
        window.location = "http://www.reliefboard.com/ph/";
      });

      $(window).scroll(function () {
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
            offset = offset + 5;         
            search();
        }
      });


      search();
    </script>

    <!-- END BODY -->



  </body>

</html>