<!DOCTYPE html>
<html lang="en">

  <head>

    <title>ReliefBoard - get help, give help during calamities</title>

    <!-- CSS CODE -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/admin.css" rel="stylesheet" />
 
  </head>

  <!-- START BODY -->
  <body>

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
             <li style="font-size:20px;padding:10px">ADMIN</li>
             <li style="padding-top:15px"><span class="glyphicon glyphicon-chevron-down"></span></li>
          </ul>
        </nav>

      </div>

    </div>

    <!-- END - FIXED NAV -->

    <!-- START BODY-->
    <div class="container">
      
      <!-- START MESSAGE LIST-->
      <div class="col-lg-4 col-md-4" id="message-list">
        
        <input type="text" id="search" placeholder="Search" class="form-control" autocomplete="off">
        <hr/>
        <!-- REMOVE THIS : CONVERT TO TEMPLATE-->
        <div id="message">
          <h4 style="float:left"><b>Kristela Mae-Joy Valentin</b></h4>
          <h6 style="float:right">10:30pm</h6>
          <br/><br/>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
            been the industry's standard dummy text ever since the 1500s...
          </p>
          <hr/>
        </div>
        <div id="message">
          <h4 style="float:left"><b>Joanna Lee</b></h4>
          <h6 style="float:right">Nov. 26</h6>
          <br/><br/>
          <p>
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also...
          </p>
          <hr/>
        </div>
        <!-- REMOVE THIS : END OF TEMPLATE -->

      </div>
      <!-- END MESSAGE LIST-->
      
      <!--START CHAT BOX-->
      <div class="col-lg-8 col-md-8" id="chat-box">
        <div id="conversation">
          <!-- REMOVE THIS : CONVERT TO TEMPLATE-->
          <div id="expanded-message-left">
            <h4><b>Kristela Mae-Joy Valentin</b></h4>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
              been the industry's standard dummy text ever since the 1500s...
            </p>
            <h6 style="text-align:right">10:30pm</h6>
            <hr/>
          </div>
          <div id="expanded-message-right">
            <h4 style="text-align:right"><b>ADMIN</b></h4>
            <p style="text-align:right">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
              been the industry's standard dummy text ever since the 1500s...
            </p>
            <h6 style="text-align:left">11:30pm</h6>
            <hr/>
          </div>
          <!-- REMOVE THIS : END OF TEMPLATE -->
        </div>
        <div id="message-input">
          <textarea id="form-message" placeholder="Write your message..." class="form-control" required></textarea>
          <button id="send" type="button" class="btn btn-primary">SEND</button>
        </div>

      </div>
      <!--END CHAT BOX-->
      

    </div>    
    <!-- END DIV BODY-->

    
  </body>
  <!-- END BODY -->

</html>