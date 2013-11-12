<?php
class Feed_model extends Kiel_Model{

	public function get_messages()
	{
		
		return $this->data_handler->get('messages',null,null,null,null,'date_created');
	}

	public function add_messages($user_no,$addr,$name,$message)
	{
		$data = '';
		$tm = $this->_time;
		$id = md5($this->_time.$name);
		$data .= "'{$id}',";
		if($addr != NULL){
			$addr = strip_tags(filter_var($addr,FILTER_SANITIZE_ENCODED));
			$data .= " '{$addr}',";
		} else{
			$data .= " NULL,";
		}
		if($name != NULL){
			$name = strip_tags(filter_var($name,FILTER_SANITIZE_ENCODED));
			$data .= " '{$name}',";
		} else{
			$data .= " NULL,";
		}
		$data .= " '{$user_no}',";
		$message = strip_tags(filter_var($message,FILTER_SANITIZE_ENCODED));
		$data .= " '{$message}',";
		
		$data .= " {$tm}, {$tm} ";


		return $this->data_handler->insert('messages',$data);
	}
}

?>