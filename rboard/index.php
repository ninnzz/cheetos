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
    <meta property="og:image" content="http://www.reliefboard.com/rboard/img/profile-pic-205.jpg" />
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
          <ul class="nav navbar-nav navbar-right">
            <li>
            <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
            <div id="search-filter">
              <b>Filter Search</b>
              
              <div class="checkbox">
                <label>
                  <input type="checkbox" checked="checked" id="filter-name" class="filter"> Name
                </label>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" checked="checked" id="filter-location" class="filter"> Location
                </label>
              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" checked="checked" id="filter-message" class="filter"> Message
                </label>
              </div>

            </div>
            </li>
          </ul>
        </nav>
      
      </div>

    </div>

    <!-- END - FIXED NAV -->

    <!-- START BODY -->

    <div id="main-container" class="container">

      <div class="row">

        <div id="copy-container" class="col-lg-7 col-md-7">
          <div id="copy">
            <b style="font-weight: 800; font-size: 22px; color: #294360;">Need help? Looking for someone? Want to share information?</b>

              
            <h2 style="font-weight: 800; font-size: 46px; margin-top: -1px; color: #1d2f43;">We help you get the word out</h2>
          </div>
          
          <div id="copy2">
              <p style="color: #294360; font-weight: 800; font-size: 16px;">
                ReliefBoard is a messaging service that helps you reach the world in times of calamities.
              </p>
              <!-- 
              <p style="text-align:center;">
                <img src="img/banner.png" style="width:80%;">
              </p> 
              -->
                        <div class="share-container" style="width: 300px; margin: 0 auto;">
            <div class="pull-left">
              <div class="social-item">
                <div id="fb"class="fb-like" data-href="http://www.reliefboard.com/rboard" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
              </div>  
              <div class="social-item">
                <div class="fb-share-button" data-href="http://www.reliefboard.com/rboard" data-type="button_count"></div>
              </div>
              <div class="social-item">
                <a id="tw" href="https://twitter.com/share" data-url="http://www.reliefboard.com/rboard" data-text="ReliefBoard is a messaging service that helps you reach the world in times of calamities." class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                  Tweet
                </a>
              </div>
            </div>
              </div>
          </div>
          
          <div class="copy3" style="text-align: center;">
            <a id="viaweb" class="btn btn-danger " href="#">POST A NEW MESSAGE</a>
          </div>
        
        </div>

        <div id="search-copy-container" class="col-lg-7 col-md-7" style="display: none; margin: 20px 0;">
          <button id="back-to-feed" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back to Feeds</button>
          <h3>Search Results:</h3>
        </div>

        <div id="sidebar" class="col-lg-5 col-md-5" style="float: right;">
          <div id="copy">
            <b style="color: #294360; font-weight: 800; font-size: 22px;">
              A service for Filipinos affected by  Typhoon Yolanda / Haiyan
            </b>
          </div>
          <div class="copy3">
            <!-- <p style="color: #294360; font-weight: 800; font-size: 22px;">
              We launched this service to help the Philippine Yolanda Typhoon victims.
            </p> -->
            <p style="color: #3c4958; font-weight: 800; font-size: 18px;">
            How to post to Reliefboard
            </p>
            1. Send a <b>FREE SMS</b> to: 
            <br /> 
            <b style="font-size: 20px;">260011 (GLOBE/TM) or </b>
            <b style="font-size: 20px;">68009 (SMART) </b>
            <br />
            (from within the Philippines)
            <br /><br />
            2. Follow this format:
            <br />
            <b style="font-size: 18px;">LOCATION/NAME/MESSAGE</b>
            <br /><br />
            Example:<br />
            <b style="font-size: 18px;">Palo, Leyte/Juan dela Cruz/We need doctors!</b>
            <br /><br />
            3. Your message will automatically be posted on ReliefBoard.com
          </div>
          <div>
            <br/>
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Sponsors</p>
              <div align="center">
                <a href="https://www.globe.com.ph" target="_blank" title="Globe"><img src="http://www.negosyoabroad.com/uploads/globe-logo.jpg" height="80px"></a>
                <a href="https://www.smart.com.ph" target="_blank" title="Smart"><img src="http://www.pinoytechblog.com/wp-content/uploads/2011/10/Smart-Logo.gif" height="80px"></a>
                <!-- <a href="https://www.globelabs.com.ph" target="_blank" title="Globe Labs"><img src="img/globelabs_logo_new_blue.png" height="20px"></a> -->
                <a href="http://semaphore.co/" target="_blank" title="Semaphore"><img src="img/semaphore.png" height="80px"></a>
                <a href="http://youphoriclabs.com/" target="_blank" title="Youphoric Labs"><img src="img/youphoric_labs_logo.png" height="100px" ></a>
                <!-- <a href="http://www.reliefboard.com/rboard/apidoc.php">API DOCUMENTATION</a> -->
              </div>
              <br />
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Partner Websites</p>
              <div align="center">
                <a href="http://www.bangonph.com/" target="_blank" title="#bangonph"><img src="img/bangonph_logo.png" height="50px" style="margin-right: 40px"></a> 
                <a href="http://www.rappler.com/" target="_blank" title="Rappler"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/c28.28.357.357/s160x160/1013982_602733916414062_1520967810_n.png" height="70px" ></a>
                <br /><br />
                <a href="http://www.bangonph.com/" target="_blank" title="#bangonph"><img src="http://google.org/personfinder/global/google-person-finder.gif" height="30px" ></a>
              </div>
              <br />
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Developers</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px; text-align: center;"><a href="http://www.reliefboard.com/rboard/apidoc.php" target="_blank" title="ReliefBoard API Documentation">ReliefBoard API Documentation</a></p>
          </div>
        </div>

        <div class="col-lg-7 col-md-7" style="float: left; margin-top: -20px;">
          <div id="notif-container">
            <a href="#" class="notif" title="Click to Show">There are <span id="count"></span> new post(s). Click to Show.</a>
          </div> 
          <div id="msg"></div>
          <div id="results"></div>
        </div>

      </div>


      <div class="row">

      </div>

    </div>

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
            <input id="form-mobile-number" class="form-control" type="text" placeholder="Mobile number" />
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

    <script type="text/template" id="post">
      <% if( d.message != null && d.message != "" ) { %>
      <div class="post<%= d.id %> post" data-id="<%= d.id %>">
          
          <div class="time-container">
            <div class="time-asset"></div>
            <div class="time-data"><span class="time" data-time="<%= d.date_created %>"></span></div>
          </div>

          <div class="from-app">
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



          <p class="msg-data">
            
            <%= convertToLinks(unescape(unescape(decodeURIComponent(unescape(d.message))))) %>
            
             <br /> <br />

            <% if( d.sender != null ) { %>
              <b><span class="glyphicon glyphicon-user"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.sender)))) %> 
            <% } %>

            <% if( d.place_tag != null ) { %>
              | <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.place_tag)))) %></b>
            <% }%>

          </p>

          <!--<div class="tag-container">
            <br /><br />
            <input id="tag_<%= d.id %>" type="hidden" class="form-control" />
            <br /> <br />
          </div>-->
          
          <div class="share-container">
            <div class="pull-left">
              <div class="social-item">
                <div id="fb"class="fb-like" data-href="http://www.reliefboard.com/rboard/post.php?id=<%= d.id %>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
              </div>  
              <div class="social-item">
                <div class="fb-share-button" data-href="http://www.reliefboard.com/rboard/post.php?id=<%= d.id %>" data-type="button_count"></div>
              </div>
              <div class="social-item">
                <a id="tw" href="https://twitter.com/share" data-url="http://www.reliefboard.com/rboard/post.php?id=<%= d.id %>" data-text="<%= unescape(unescape(decodeURIComponent(unescape(d.message)))) %>" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                  Tweet
                </a>
              </div>
            </div>
            <div class="pull-right">
              <a class="comment" href="http://www.reliefboard.com/rboard/post.php?id=<%= d.id %>" title="View comments and share this message" target="_blank">Responses</a> 
              <a class="share" target="_blank" data-id="<%= d.id %>" href="#">Report</a>
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
    <script src="js/build.js"></script>


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

    <!-- END BODY -->

    <div class="fixed-side-social-container">
    <a class="social-icon facebook-icon" href="https://www.facebook.com/reliefboard" target="new" title="Like us on Facebook"><span></span></a>
    <a class="social-icon twitter-icon" href="https://twitter.com/reliefboardph" target="new" title="Follow us on Twitter"><span></span></a>
    </div>

  </body>

</html>