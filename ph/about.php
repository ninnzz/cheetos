<?php 
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

  $url = "http://www.reliefboard.com/ph";
  $bitly = make_bitly_url($url,'kjventura','R_afc197795cfaf9242fc1063b2c77c48d','json');
?>
<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" >

  <head prefix="og: http://ogp.me/ns/website#" >

    <title>ReliefBoard - About</title>

    <!-- META -->
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- META COPY FOR SEO -->
    <meta name="description" content="Need help? Looking for someone? Want to share information? We help you get the word out." />

    <?php include_once("header.php");?>

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

       
      
      </div>

    </div>

    <!-- END - FIXED NAV -->

    <!-- START BODY -->

    <div id="main-container" class="container">

      <div class="row">
        <div  class="col-md-12" style=" margin: 10px 0;">
          <button id="back-to-feed" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span> Back to Feeds</button>
          
        </div>
        
        <div id="copy-container" class="col-md-12 text-center">
          <div id="copy">
            <b style="font-weight: 800; font-size: 22px; color: #294360;">Need help? Looking for someone? Want to share information?</b>

              
            <h2 style="font-weight: 800; font-size: 46px; margin-top: -1px; color: #1d2f43;">We help you get the word out</h2>
          </div>
          
          <div id="copy2">
              <p style="color: #294360; font-weight: 800; font-size: 16px;">
                ReliefBoard is a messaging service that helps you reach the world in times of calamities.
              </p>
            <div class="share-container" style="width: 300px; margin: 0 auto;">
            <div class="pull-left">
              <div class="social-item">
                <div id="fb"class="fb-like" data-href="http://www.reliefboard.com/ph/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
              </div>  
              <div class="social-item">
                <div class="fb-share-button" data-href="http://www.reliefboard.com/ph" data-type="button"></div>
              </div>
              <div class="social-item">
                <a id="tw" href="https://twitter.com/share" data-url="<?php echo $bitly; ?>" data-text="ReliefBoard is a messaging service that helps you reach the world in times of calamities." class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                  Tweet
                </a>
              </div>
            </div>
              </div>
          </div>
        
        </div>

       <div class="col-md-12 text-center" style=" margin: 10px 0;">
          <h3 style="font-weight:800">
            <a href="https://twitter.com/reliefboardph" target="new" title="Follow us on Twitter">Visit our twitter page</a>
            <br>
            <a href="https://www.facebook.com/reliefboard" target="new" title="Like us on Facebook">Visit our facebook page</a>
          </h3>
        </div>

        <div class="col-md-12 text-center">
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


    <script type="text/templ" id="twTemplate">
      <a id="tw" href="https://twitter.com/share"  data-text="" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">Tweet</a>
    </script>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <script>
      $( function () {
        $.getScript('http://platform.twitter.com/widgets.js');
        if (typeof(FB) != 'undefined'
           && FB != null ) {
            FB.XFBML.parse();
        } else {

        }
      });

      $(document).on("click","#back-to-feed",function(e) {
        e.preventDefault();
        window.location = "/";
      });
      
    </script>

    <!-- END BODY -->


  </body>

</html>