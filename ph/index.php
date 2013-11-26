<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" >

  <head prefix="og: http://ogp.me/ns/website#" >

    <title>ReliefBoard - get help, give help during calamities</title>

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

      <div class="col-lg-7 col-md-7" id="news" style="">
        <span>Philippines:</span>
        <a href="https://www.google.com/search?q=yolanda+haiyan+typhoon&tbm=nws" target="_blank">Typhoon Yolanda/Haiyan</a>
        <a href="https://www.google.com/search?q=bohol+earthquake&tbm=nws" target="_blank">Bohol Earthquake</a>
      </div>
      <div class="col-lg-7 col-md-7" style="background-color:#EBEAEA;margin-top:20px;margin-bottom:20px;">
        <div class="copy3" style="text-align: center;">
            <a id="viaweb" class="btn btn-danger " href="#">Ask for help</a>
            <a id="viasms" class="btn btn-danger "  href="#">Ask for help via SMS/Mobile</a>
          </div>
      </div>

        <div id="search-copy-container" class="col-lg-7 col-md-7" style="display: none; margin: 20px 0;">
          <button id="back-to-feed" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back to Feeds</button>
          <h3 id="search_results_text">Search Results:</h3>
        </div>

        <div id="sidebar" class="col-lg-5 col-md-5" style="float: right;">
         
          
          <div id="links">
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Critical Needs</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="search.php?keyword=relief%20goods"  title="Relief Goods" id="relief_goods">Relief Goods</a>
              <a href="missing.php"  title="Find missing people" id="find_missing_people">Missing People</a>
              <a href="search.php?keyword=volunteers"  title="Call for volunteers" id="call_for_volunteers">Call for volunteers</a>
              <a href="foodwater.php"  title="Food and water" id="food_watter">Food and water</a>
            </p>
            <p style="color: #294360; font-weight: 800; font-size: 22px;">Critical Areas</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="search.php?keyword=tacloban"  title="Tacloban, Leyte" >Tacloban, Leyte</a>
              <a href="search.php?keyword=cebu"  title="Cebu" >Cebu</a>
              <a href="search.php?keyword=palo"  title="Palo, Leyte" >Palo, Leyte</a>
              <a href="search.php?keyword=bohol"  title="Bohol" >Bohol</a>
            </p>

<!--             <p style="color: #294360; font-weight: 800; font-size: 22px;">Important Info</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="#"  title="Find missing people" >Other relief oriented Philippine websites</a>
            </p> -->

            <p style="color: #294360; font-weight: 800; font-size: 22px;">Sponsors</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="https://www.globe.com.ph"  target="_blank" title="Globe" >Globe Telecommunications</a>
              <a href="https://www.smart.com.ph" target="_blank"  title="Smart" >Smart Communications</a>
              <a href="http://semaphore.co/" target="_blank" title="Semaphore" >Semaphore</a>
              <a href="http://youphoriclabs.com/" target="_blank" title="Youphoric Labs" >Youphoric Labs</a>
            </p>

            <p style="color: #294360; font-weight: 800; font-size: 22px;">Connect to ReliefBoard</p>
            <p style="color: #294360; font-weight: 800; font-size: 18px;">
              <a href="http://www.reliefboard.com/ph/apidoc.php" target="_blank" title="ReliefBoard API Documentation">ReliefBoard API Documentation</a>
            </p>

          </div>
          <div>
         
           
            
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
            <input id="form-mobile-number" class="form-control" type="text" placeholder="Mobile number - Optional" />
<!--             <br />
              <input id="form-tags" type="hidden" class="form-control" placeholder=""> -->
            <br /><br />
            <button id="viawebSend" type="button" class="btn btn-primary">Post to ReliefBoard.com</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="viaSMSModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"> How to post to Reliefboard</h4>
           
           
          </div>
          <div class="copy3">
            <!-- <p style="color: #294360; font-weight: 800; font-size: 22px;">
              We launched this service to help the Philippine Yolanda Typhoon victims.
            </p> -->
            
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
          
        </div>
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
                <span class="app-name"><span class=""></span> SMS  0<%=d.sender_number.substring(2,5) %>-<%=d.sender_number.substring(5,8) %>-xxxx</span>
     
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
            <div class="bottom_info">  
              <% if( d.sender != null ) { %>
                <b><span class="glyphicon glyphicon-user"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.sender)))) %> 
              <% } %>

              <% if( d.place_tag != null ) { %>
                | <span class="glyphicon glyphicon-map-marker"></span> <%= unescape(unescape(decodeURIComponent(unescape(d.place_tag)))) %></b>
              <% }%>
            </div>
              <% if( (d.tags != null) && (d.tags !="") ) { 
                var tags = d.tags.split(",");
                var tag_count = tags.length;%>
                <b class="tags ">
               <% for (i=0; i < tag_count; i++) { %>
                  <a href="search.php?keyword=<%= tags[i] %>"  > #<%=tags[i] %></a>
               <% } console.log(d.tags);%>
                
                </b>
              <% }else{%>
                <b><a href="post.php?id=<%= d.id %>"  class="tags "> Add Tags</a></b>
              <% }%>
            
          </p>
   
          <hr/> 
          <div class="share-container">
            <a class="help" href="http://www.reliefboard.com/ph/post.php?id=<%= d.id %>" title="View comments and share this message" target="_blank">Help, assist, or comment</a> 
            <!--&nbsp;&nbsp;YOU and 3 people are helping-->
            <div class="pull-right">
                
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




    <!-- END BODY -->

  </body>

</html>