<?php 

include 'session.php';
$session = new session();

class login { 

	function __construct()
    {
        
    }
    public  function login() { 
    	
         	$username = isset($_POST["username"]) ? $_POST["username"]: false;
			$password = isset($_POST["password"]) ? $_POST["password"] : false;

			if(!($username || $password)){
				$this->echo_fail("Missing parameters");
				return;
			}
			
			$data = array(
				"username" => $username,
				"password" => $password
			);

			$result = $this->curl_post("http://localhost.reliefboard.com/ph/login_controller/test_login_endpoint.php", 
			$data);

			if($result['status'] == "ok"){

				$_SESSION['username'] = $result['result']['username'];
				$this->echo_ok($result['result']);
			}

    } 

    public function logout(){
    	session_unset(); 
		session_destroy(); 
		$this->echo_ok("Sucessfully logged out");
    }

    public function echo_ok($message){
    	$data = array('status' =>  'ok', "result" => $message );
    	echo json_encode($data);
    }

    public function echo_fail($error){
    	$data = array('status' =>  'fail', "message" => $error );
    	echo json_encode($data);
    }

    public function curl_post($endpoint, $params){
    	$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $endpoint);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	    $response = curl_exec($ch);
	    curl_close($ch);
	    return json_decode($response, TRUE);
    }
} 


?>