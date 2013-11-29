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

    <!-- START LOGIN CONTAINER -->
    <div class="center-block" id="login-container">
      <a id="logo-login" class="navbar-brand" href="/" title="ReliefBoard"></a> 
        <form id="login_form" >
          <input type="text" id="username" placeholder="Username" class="form-control" required>
          <br/>
          <input type="password" id="password" placeholder="Password" class="form-control" required>
          <button id="login" type="submit" class="btn btn-success">LOG IN</button>
        </form>
    </div>    
    <!-- END LOGIN CONTAINER -->

  </body>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script>
  

  //on submit of form
  $(document).on("submit","#login_form", function(e) {
      e.preventDefault();
      var data = {
        "username" : document.getElementById('username').value,
        "password" : document.getElementById('password').value
      };

      $.ajax({
          url: "http://localhost.reliefboard.com/ph/login_controller/login_create.php",
          type: "POST",
          data: data,
          success: function(response){
            obj_response = JSON.parse(response);
            console.log(obj_response);
            if (obj_response.status == 'ok'){
              window.location = "admin.php"
            }
          }
       });
  });
  
  </script>
  <!-- END BODY -->

</html>

