<?php
  $id = $_GET['id'];
  $data = file_get_contents( "http://ec2-204-236-162-197.us-west-1.compute.amazonaws.com/messages/feed_item?message_id=" . $id );
  $data = json_decode($data, true);

  $data = $data['data']['result']['0'];
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo urldecode($data['message']); ?>">
    <meta name="author" content="">
    <meta property="og:title" content="ReliefBoard">
    <meta property="og:description" content="<?php echo urldecode($data['message']); ?>">
    <title>ReliefBoard</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/post.css" rel="stylesheet">

  </head>

  <body>

  <div id="fb-root"></div>

  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214855112027480";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'reliefboard'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
  </script>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">ReliefBoard</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <form class="navbar-form">
            <div class="form-group">
              <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
            </div>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      
      <div class="container">
        <br />
        
        <p><?php echo urldecode($data['message']); ?></p>
        <p><span class="label label-default time" data-time="<?php echo $data['date_created']; ?>"><?php echo $data['date_created']; ?></span></p>
        <p><?php echo urldecode($data['place_tag']); ?>, <?php echo urldecode($data['sender']); ?> , <?php echo urldecode($data['sender_number']); ?> </p>
        
        <div class="fb-like" data-href="http://reliefboard.com<?php echo $_SERVER["REQUEST_URI"]; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        <div><a href="https://twitter.com/share"  data-text="<INSERT MESSAGE HERE> #reliefboard VIA reliefboard.com" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">Tweet</a></div>

      </div>

    </div>

    <div class="container">
      
      <div class="row">

        <h3>Comments</h3>

        <div class="comments-container">
          <div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]; ?>" data-numposts="100"></div>
           <div id="disqus_thread"></div>
        </div>

      </div>

    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/underscore.min.js"></script>
    <script src="js/time.js"></script>
    <script src="js/post.js"></script>

  </body>
</html>