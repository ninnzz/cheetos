<?php
class Messages extends Kiel_Controller{

	public function feed_get()
	{
		$this->load_model('feed_model');
		$offset    = $this->get_args['offset'];
		$limit     = $this->get_args['limit'];
		$parent_id = $this->get_args['parent_id']; 
		
		if(isset($this->get_args['parent_id'])){
			$parent_id = $this->get_args['parent_id']; 
		} else{
			$parent_id = NULL; 
		}

		if(isset($this->get_args['source'])){
			$source = trim(strtolower($this->get_args['source'])); 
		} else{
			$source = NULL;
		}

		if(empty($limit)){
			$offset = 0;
			$limit  = 10;
		}
		$res  = $this->feed_model->get_messages($parent_id ,$offset ,$limit,$source);
		$this->response(array('status'=>'Success','data'=>$res),200);
	}

	public function feed_item_get()
	{
		if($this->get_args['message_id'] && isset($this->get_args['message_id']) && $this->get_args['message_id'] !== NULL){
			$this->load_model('feed_model');
			$res = $this->feed_model->single_item($this->get_args['message_id']);
			$this->response(array('status'=>'Success','data'=>$res),200);
		}
	}

	public function feed_post()
	{
		$required = array('app_id','message','name');
		$this->required_fields($required,$this->post_args);
		$this->checkAuth($this->post_args['app_id']);

		$this->load_model('feed_model');
		$user_no = $this->post_args['user_number'];
		$addr = $this->post_args['address'];
		$name = $this->post_args['name'];
		$message = $this->post_args['message'];
		$app_id = $this->post_args['app_id'];		

		$parent_id = $this->post_args['parent_id'];
		$res = $this->feed_model->add_messages($user_no,$addr,$name,$message,$app_id,NULL,$parent_id);	
		if($res)		
		{
			$message = urldecode($message);
			$this->sns_crosspost($message);
			$this->post_to_sms($message,$res['id']);
		}

		$this->response(array('status'=>'Success'),200);

	}


	public function search_get()
	{
		$offset = $this->get_args['offset'];
		$limit  = $this->get_args['limit'];
		
		if(empty($limit)){
			$offset = 0;
			$limit  = 10;
		}

		if($this->get_args['q'] && isset($this->get_args['q']) && $this->get_args['q'] != ""){
			$this->load_model('feed_model');
			$res = $this->feed_model->search($this->get_args['q'], $offset, $limit);
			$this->response(array('status'=>'Success','data'=>$res),200);

		} else {

		}
	}

	public function feed_callback_semaphore_post()
	{
		$data = $this->post_args;
		$msg = $data['message'];
		$num = $data['number'];
		$id = $data['message_id'];
		
		$this->response(array('status'=>'Success','data'=>json_encode($data)),200);

	}
	
	public function feed_callback_smart_get()
	{
		$this->load_model('feed_model');

		$data 	 = $this->get_args;
		$user_no = $data['from'];
		$smsMsg  = $data['text'];
		$msg_arr = explode('/',$data['text']);
		if(count($msg_arr) === 3){
			$addr = $msg_arr[0];
			$name = $msg_arr[1];
			$message = $msg_arr[2];

			$res = $this->feed_model->add_messages($user_no,$addr,$name,$message,'sms.smart',null);
		} else if(count($msg_arr) === 2){
			$addr = $msg_arr[0];
			$message = $msg_arr[1];

			$res = $this->feed_model->add_messages($user_no,$addr,null,$message,'sms.smart',null);
		} else {
			if(trim($smsMsg) !== ""){
				$message = $smsMsg;
				$res = $this->feed_model->add_messages($user_no,null,null,$message,'sms.smart',null);
			}
		}

		if($res)		
		{	
			$message = urldecode($message);
			$this->sns_crosspost($message);
		}
	}

	public function feed_callback_post()
	{
		$this->load_model('feed_model');

		/*********MESSAGE PART******************/
		$xml = simplexml_load_file('php://input');
		$sms = array();
		$nodes = $xml->xpath('/message/param');

		foreach($nodes as $node) {
		   $param = (array) $node;
		   $sms[$param['name']] = $param['value'];
		}

		if($sms['messageType'] == 'SMS') {
		   $user_no = $sms['source'];
		   $smsMsg = $sms['msg'];
		} else{
		   die("Invalid message type");
		}



		$msg_arr = explode('/',$smsMsg);

		/*****FOR HYCH******/

		if(isset($msg_arr[0])){
			$key_word = explode(' ',trim($msg_arr[0]));
			if(trim(strtolower($key_word[0])) === 'hych'){
				$source_type = trim(strtolower($key_word[1]));
				$source = 'HYCH';
				if(count($msg_arr) === 5 ){
					$addr = $msg_arr[3];
					$name = $msg_arr[1];
					$message = $msg_arr[4];	
					$user_no = $msg_arr[2];	
					$res = $this->feed_model->add_messages($user_no,$addr,$name,$message,$source,$source_type);
				} else if(count($msg_arr) === 4){
					$message = $msg_arr[1].'/'.$msg_arr[2].'/'.$msg_arr[3];
					$res = $this->feed_model->add_messages(null,null,null,$message,$source,$source_type);
				} else if(count($msg_arr) === 3){
					$message = $msg_arr[1].'/'.$msg_arr[2];
					$res = $this->feed_model->add_messages(null,null,null,$message,$source,$source_type);
				} else if(count($msg_arr) === 2){
					$message = $msg_arr[1];
					$res = $this->feed_model->add_messages(null,null,null,$message,$source,$source_type);
				} else{
					$res = false;
				}

			}


			/***For relief board***/
			else {

				if(count($msg_arr) === 3){
					$addr = $msg_arr[0];
					$name = $msg_arr[1];
					$message = $msg_arr[2];

					$res = $this->feed_model->add_messages($user_no,$addr,$name,$message,'sms.globe',null);
				} else if(count($msg_arr) === 2){
					$addr = $msg_arr[0];
					$message = $msg_arr[1];

					$res = $this->feed_model->add_messages($user_no,$addr,null,$message,'sms.globe',null);
				} else {
					if(trim($smsMsg) !== ""){
						$message = $smsMsg;
						$res = $this->feed_model->add_messages($user_no,null,null,$message,'sms.globe',null);
					}
				}
			}
			/******Relief Board end******/

		}

		
		if($res)		
		{	
			$message = urldecode($message);
			$this->sns_crosspost($message);
		}
	}

	public function message_flag_post()
	{
		$this->load_model('feed_model');

		$data = $this->post_args;
		$res = $this->feed_model->update_status($data);
		
		$this->response(array('status'=>'Success'),200);	
	}

	private function sns_crosspost($message)
	{
		$params['facebook_access_token'] = 'CAADDaNqhbVgBAHJqjx4fqE8iN006WvF9tBoJK9s7DWy5UAM4RMWyhiMGxQOyuMR32uYhZBrUlx42Jv9SOefXh2JA051xig8l2TAd5XymykksQD3ximfthOXl2CnSlY3KaqFDtbZBuz1WOFI3ZAVaY9U9FLiZCugYCUhVZBjzeJbRXeM2EIos9QXO0azcCE6EZD';
		//https://graph.facebook.com/oauth/access_token?client_id=214855112027480&client_secret=d481012df6d2e947e8442cc35d211fd3&grant_type=fb_exchange_token&fb_exchange_token=
		$params['twitter_access_token'] = '2190619520-lmj8aeP0mjXFWOH8feFGA144qaBPJMLjlbAy7kF';
		$params['twitter_access_secret'] = '2SO03jgYn31wJEZyXkaQI48MfX56Ktbo8fM7G2URiFfUB';
		$params['place'] = '454373604683875';
		$params['message'] = $message;
		
		$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		    curl_setopt($ch, CURLOPT_URL, 'http://api.buzzboarddev.stratpoint.com/posts/v1/fb_post');
		    curl_setopt($ch, CURLOPT_POST, true);

		    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		    curl_exec($ch);
	}

	private function post_to_sms($message,$parent_id)
	{
		$params['message']    = $message;
		$params['msg_id'] = $parent_id; 
		
		$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_VERBOSE, 0);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
		    curl_setopt($ch, CURLOPT_URL, 'http://tma.herokuapp.com/notify');
		    curl_setopt($ch, CURLOPT_POST, true);

		    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		    curl_exec($ch);
	}
}

?>

