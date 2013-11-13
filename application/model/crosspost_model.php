<?php
include_once('SNSOAuth.php');
include_once('OAuthUtils.php');
require('fb/facebook.php');

class Crosspost_model extends Kiel_Model{

	/**
	* Codeigniter Instance
	* @var
	**/
	private $CI;
  
  
	/**
	* Default values of required/optional parameters
	* @var
	**/
	private $defaults;
  
	/**
	* User's data
	* @var
	**/
	private $userData;
  
  
	/**
	* Holds the result of cross posting
	* @var
	**/
	private $postResult;

	public function __construct($userData = array()){
		$this->defaults = array(
			'message'			=> '',
			'place'				=> ''
		);
	}

	/**
	  * general function for cross posting
	  * calls specific cross post function
	  *
	  * @sns  (string)  comma separated values of social networks
	  **/
	public function crossPost($sns){
		$xpost = explode(",",$sns);
		if (in_array('fb', $xpost)){
			$this->facebookCrossPost();}
		if (in_array('tw', $xpost))
			$this->twitterCrossPost();
		return $this->postResult;
	}

	public function setUserData($userData = array()){
		$this->userData = array_merge($this->defaults,$userData);
	}

	/*
  	* Facebook cross post
  	* 
  	*/
	private function facebookCrossPost(){
 	   	//check if the user has a facebook access_token
		if (empty($this->userData['facebook_access_token'])) {
			$this->postResult['fb']['error'] = 'User $user_id does not have a Facebook access token.';
		} else {
			try {
      
        //get access token
				$user_fb_access_token = $this->userData['facebook_access_token'];
				
        //set access token
				$this->setAccessToken($user_fb_access_token);
					
        //prepare data
				$data = array();
				$data['message'] = $this->userData['message'];
				if(!empty($this->userData['place'])) 
					$data['place'] = $this->userData['place'];
        		if($this->userData['has_image']){
          //if has image, set specific settings
					$facebook->setFileUploadSupport(TRUE);
					$data['source']		= $this->userData['source'];
					$res = $facebook->api('me/photos', 'POST', $data);
					$post_id = (isset($res['id'])) ? $res['id'] : json_encode($res);
				}
				else{
					$res = $facebook->api('me/feed', 'POST', $data);
					$post_id = (isset($res['id'])) ? $res['id'] : json_encode($res);
				}
        
        //get post id
				$this->postResult['fb']['post_id'] = $post_id;
        
			} catch (Exception $e) {
				$this->postResult['fb']['error'] = $e->getMessage();
			}
		}
	}
}

?>