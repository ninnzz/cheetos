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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!--     
      <link href="css/select2.css" rel="stylesheet" />
      <link href="css/select2-bootstrap.css" rel="stylesheet" /> 
    -->
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

      <div class="col-lg-7 col-md-7" style="background-color:#EBEAEA;margin-top:30px;margin-bottom:20px;">
        
        <div id="posting-container">
          
            <div id="loginToFacebook">
              <b>Login with Facebook to Start Posting to ReliefBoard</b> <br /> <br />
              <div class="fb-login-button" data-scope="email" data-width="200"></div>
            </div>

            <br/>

            <div id="form-container">

              <b>Your Name: <span id="authenticated-name"></span> <span style="color: gray !important;">(Facebook)</span> </b>
              <br /><br />
              <input id="form-location" class="form-control" type="text" placeholder="Location - Where is help needed?"/>
              <br />
              <textarea id="form-message" placeholder="Message - Please be as specific as possible about the concerned people, places, and contact information" class="form-control"></textarea>
              <br />
              <input id="form-mobile-number" class="form-control" type="text" placeholder="Mobile number" />
              <br/>
              <input id="form-tag" class="form-control" type="text" placeholder="Tag" />
              <br />
              <div align="center">
                <button id="viawebSend" type="button" class="btn btn-primary">ASK FOR HELP</button>
              </div>
              <br />

            </div>

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
            <b style="font-size: 18px;">Location/Name/Message</b>
            <br /><br />
            Example:<br />
            <b style="font-size: 18px;">Palo, Leyte/Juan dela Cruz/We need doctors!</b>
            <br /><br />
            3. Your message will automatically be posted on ReliefBoard.com
          </div>
          <div>
            <h3>Want to help?</h3>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="http://www.reliefboard.com/ph/relief.php"  title="Find missing people" id="find_missing_people">Relief Goods</a><br/>
              <a href="http://www.reliefboard.com/ph/missing.php"  title="Find missing people" id="find_missing_people">Find missing people</a><br/>
              <a href="http://www.reliefboard.com/ph/call_for_volunteers.php"  title="Call for volunteers" id="call_for_volunteers">Call for volunteers</a><br/>
              <a href="http://www.reliefboard.com/ph/foodwater.php"  title="Find missing people" id="find_missing_people">Food and water</a><br/>
              <a href="places.php?keyword=tacloban"  title="Find missing people" id="find_missing_people">Tacloban</a><br/>
              <a href="places.php?keyword=cebu"  title="Find missing people" id="find_missing_people">Cebu</a><br/>
            </p>


          </div>
          <div>
            <br/>
             <p style="color: #294360; font-weight: 800; font-size: 22px;">Partner Websites</p>
              <div align="center">
                <a href="http://www.bangonph.com/" target="_blank" title="#bangonph"><img src="img/bangonph_logo.png" height="50px" style="margin-right: 40px"></a> 
                <a href="http://www.rappler.com/" target="_blank" title="Rappler"><img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/c28.28.357.357/s160x160/1013982_602733916414062_1520967810_n.png" height="70px" ></a>
                <br /><br />
                <a href="http://www.bangonph.com/" target="_blank" title="#bangonph"><img src="http://google.org/personfinder/global/google-person-finder.gif" height="30px" ></a>
                <br/><br/>
                 <a href="http://gohelpph.com/" target="_blank" title="#gohelpph"><img src="img/gohelp.png" height=" 50px" style=" width: 185px"></a> 
                 <a href="http://readyph.com/" target="_blank" title="#readyph"><img src="img/readyph.png" height="50px" style="width:180px "></a> 
              </div>
              <br />
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Sponsors</p>
              <div align="center">
                <a href="https://www.globe.com.ph" target="_blank" title="Globe"><img src="http://www.negosyoabroad.com/uploads/globe-logo.jpg" height="80px"></a>
                <a href="https://www.smart.com.ph" target="_blank" title="Smart"><img src="http://www.pinoytechblog.com/wp-content/uploads/2011/10/Smart-Logo.gif" height="80px"></a>
                <!-- <a href="https://www.globelabs.com.ph" target="_blank" title="Globe Labs"><img src="img/globelabs_logo_new_blue.png" height="20px"></a> -->
                <a href="http://semaphore.co/" target="_blank" title="Semaphore"><img src="img/semaphore.png" height="80px"></a>
                <a href="http://youphoriclabs.com/" target="_blank" title="Youphoric Labs"><img src="img/youphoric_labs_logo.png" height="100px" ></a>
                <!-- <a href="http://www.reliefboard.com/ph/apidoc.php">API DOCUMENTATION</a> -->
              </div>
              <br />
           
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Developers</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px; text-align: center;"><a href="http://www.reliefboard.com/ph/apidoc.php" target="_blank" title="ReliefBoard API Documentation">ReliefBoard API Documentation</a></p>
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
                <a id="tw-<%= d.id %>" href="https://twitter.com/share" data-url="" data-text="<%= unescape(unescape(decodeURIComponent(unescape(d.message)))) %>" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
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
    <!--<script src="js/select2.min.js"></script>-->
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

  </body>

</html>