<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

  <head prefix="og: http://ogp.me/ns/website#">

    <title>ReliefBoard</title>

    <!-- META -->
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- META COPY FOR SEO -->
    <meta name="description" content="Search for your loved ones and find out how you can help in relief efforts" />

    <meta property="og:title" content="ReliefBoard" />
    <meta property="og:site_name" content="ReliefBoard" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.reliefboard.com/rboard/img/profile-pic.jpg" />
    <meta property="og:url" content="http://www.reliefboard.com" />
    <meta property="og:description" content="Search for your loved ones and find out how you can help in relief efforts" />

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


  </head>

  <body>

    <h1 style="display: none;">ReliefBoard</h1>

    <!-- START - SOCIAL NETWORK SCRIPTS -->

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

        <div class="navbar-collapse collapse navbar-right">
          
          <div id="search-container">
            <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
          </div>

        </div>
      
      </div>

    </div>

    <!-- END - FIXED NAV -->

    <!-- START BODY -->

    <div id="main-container" class="container">

      <div class="row">
        <div id="copy" class="col-lg-5">
          <h2 style="font-weight: 800; font-size: 25px;">Search for your loved ones and find out how you can help in relief efforts</h2>
        </div>
        <div id="copy2" class="col-lg-7">
            <p style="color: #3c444d; font-weight: 800;">Reliefboard.com is an SMS-to-web service that allows you to inquire <br /> about missing persons or to post updates on search and rescue efforts.</p>
            <b style="color: #242b33; font-weight: 800;">To post on ReliefBoard.com, send SMS to 23737102 (Globe): location/full name/message</b>
            <br /><br />
            <p style="color: #575e66; font-weight: 800;">(example: “Tacloban/Juan dela Cruz/My family and I are safe”, <br /> “Tacloban/Maria Santos/I’m looking for Lisa Santos from Tacloban City”)</p>
        </div>
      </div>

      <!--       
      <div class="row">
        <div id="copy3" class="col-lg-7">
          <div class="triangle"></div>
        </div>
      </div> 
      -->

      <div class="row">
        <div id="copy4" class="col-lg-7">
          <input id="form-location" class="form-control" type="text" placeholder="Location" />
          <br />
          <input id="form-name" class="form-control" type="email" placeholder="Name" />
          <br />
          <textarea id="form-message" placeholder="Message" class="form-control"></textarea>
          <br />
         <button id="viaweb" type="button" class="btn btn-primary">Post to ReliefBoard.com</button>
        </div>
      </div>

      <div class="row">

        <div id="notif-container" class="col-lg-7"><a href="#" class="notif" title="Click to Show">There are <span id="count"></span> new post(s). Click to Show.</a></div>
        <div id="msg" class="col-lg-7"></div>

      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-hidden="true">
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

    <script type="text/templ" id="twTemplate">
      <a id="tw" href="https://twitter.com/share"  data-text="" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">Tweet</a>
    </script>

    <script type="text/template" id="post">
      <% if( d.message != null && d.message != "" ) { %>
      <div class="post" data-id="<%= d.id %>">
          
          <div class="time-container">
            <div class="time-asset"></div>
            <div class="time-data"><span class="time" data-time="<%= d.date_created %>"></span></div>
          </div>

          <p class="msg-data">
            
            <%= unescape(decodeURIComponent(d.message)) %>
            <br /><br />

            <% if( d.sender != null ) { %>
              <b>By: <span class="glyphicon glyphicon-user"></span> <%= unescape(decodeURIComponent(d.sender)) %> | 
            <% } %>

            <% if( d.place_tag != null ) { %>
              <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(decodeURIComponent(d.place_tag)) %> | </b>
            <% } %>

            <span class="glyphicon glyphicon-link"></span> <a href="http://www.reliefboard.com/rboard/post.php?id=<%= d.id %>" title="Permalink" target="_blank">Details</a> 

          </p>
          
          <div class="share-container">
            <div class="pull-right">
              <button class="share" data-id="<%= d.id %>" data-msg="<%= d.message %>" data-sender="<%= d.sender %>" data-place-tag="<%= d.place_tag %>">Share</button>
            </div>
          </div>          

        </div>
        <% } %>
    </script>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/underscore.min.js"></script>
    <script src="js/time.js"></script>
    <script src="js/build.js"></script>


    <!-- END BODY -->

  </body>

</html>