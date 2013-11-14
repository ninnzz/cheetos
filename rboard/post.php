<?php
  $id = $_GET['id'];
  $data = file_get_contents( "http://ec2-204-236-162-197.us-west-1.compute.amazonaws.com/messages/feed_item?message_id=" . $id );
  $data = json_decode($data, true);
  $error = false;
  if(!isset($data['data']['result']['0']))
    $error = true;
  else
    $data = $data['data']['result']['0'];
?>
<!DOCTYPE html>
<html lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

  <head prefix="og: http://ogp.me/ns/website#">

    <title>ReliefBoard</title>

    <!-- META -->
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- META COPY FOR SEO -->
    <meta name="description" content="<?php echo urldecode(urldecode($data['message'])); ?>">

    <meta property="og:title" content="ReliefBoard" />
    <meta property="og:site_name" content="ReliefBoard" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.reliefboard.com/rboard/img/profile-pic.jpg" />
    <meta property="og:url" content="http://www.reliefboard.com" />
    <meta property="og:description" content="<?php echo urldecode(urldecode($data['message'])); ?>">

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

        <div class="navbar-collapse collapse navbar-right">
          
          <div id="search-container">
            <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
          </div>

        </div>
      
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

        <div id="msg-single" class="col-lg-7">

          <div class="post" data-id="<?php echo $data['id']; ?>">
              
              <div class="time-container">
                <div class="time-asset"></div>
                <div class="time-data"><span class="time" data-time="<?php echo $data['date_created']; ?>"></span></div>
              </div>

              <p class="msg-data">
                
                <p><?php echo urldecode(urldecode($data['message'])); ?></p>
                <br /><br />

                <?php if( $data['sender'] != null || $data['sender'] != "" ) { ?>
                  <b><span class="glyphicon glyphicon-user"></span> <?php echo urldecode(urldecode($data['sender'])); ?> 
                <?php } ?>

                <?php if( $data['place_tag'] != null || $data['place_tag'] != "" ) { ?>
                  | <span class="glyphicon glyphicon-map-marker"></span> <?php echo urldecode(urldecode($data['place_tag'])); ?></b>
                <?php } ?>

              </p>
              
              <div class="share-container">
                  <br />
                  <div id="fb"class="fb-like" data-href="http://www.reliefboard.com/rboard/post.php?id=<?php echo $id; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                  <br />
                  <a id="tw" href="https://twitter.com/share"  data-text="<?php echo urldecode(urldecode($data['message'])); ?> - <?php echo urldecode(urldecode($data['place_tag'])); ?> - <?php echo urldecode(urldecode($data['sender'])); ?> - #reliefboard VIA reliefboard.com" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">
                    Tweet
                  </a>
              </div>

          </div>

          <div class="post comments-container" data-id="<?php echo $data['id']; ?>">
              
              <div class="time-container">
                <div class="time-asset"></div>
                <div class="time-data">Comments</div>

                <div class="msg-data">
                  <br /><br />
                  <div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]; ?>" data-numposts="100"></div>
                  <br />
                </div>

              </div>

          </div>

        </div>

      </div>

    <?php endif; ?>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/underscore.min.js"></script>
    <script src="js/time.js"></script>
    <script type="text/javascript">
      $( function () {

        $(".time").prettyDate();
      
        setInterval( function() {
          $( ".time" ).prettyDate();    
        }, 10000);
        
      });
    </script>


    <!-- END BODY -->

  </body>

</html>