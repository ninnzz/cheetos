<?php 
$username = isset($_POST["username"]) ? $_POST["username"]: false;
$password = isset($_POST["password"]) ? $_POST["password"] : false;

if(!($username || $password)){
	$data = array('status' =>  'fail', "result" => "MIssing Parameters" );
	echo json_encode($data);
	return;
}

$data = array('status' =>  'ok', "result" => array("username"=>$username) );
echo json_encode($data);
?>