<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Testing">
    <meta name="author" content="">
    <meta property="og:title" content="ReliefBoard">
    <meta property="og:description" content="Testing">
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
        
        <p>THE POST GOES HERE. WAITING FOR THE API</p>
        
        <div class="fb-like" data-href="http://reliefboard.com<?php echo $_SERVER["REQUEST_URI"]; ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        <div><a href="https://twitter.com/share"  data-text="<INSERT MESSAGE HERE> #reliefboard VIA reliefboard.com" class="twitter-share-button" data-lang="en" data-related="reliefboardph:The official account of ReliefBoard">Tweet</a></div>

      </div>

    </div>

    <div class="container">
      
      <div class="row">

        <h3>Comments</h3>

        <div class="comments-container">
          <div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]; ?>" data-numposts="100"></div>
        </div>
      
      </div>

    </div>

  </body>
</html>