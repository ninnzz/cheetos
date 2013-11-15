<?php
class Feed_model extends Kiel_Model{

	public function get_messages($offset = 0, $limit = 10)
	{
		return $this->data_handler->get('messages',null,$offset,$limit,null,'date_created');
	}
	
	public function single_item($id)
	{
		return $this->data_handler->get_where('messages',null," WHERE id = '{$id}' ",null,null,null,'date_created');
	}

	public function search($q, $offset = 0, $limit = 10)
	{
		$query  = "SELECT * FROM messages WHERE MATCH (sender,message,place_tag,sender_number) AGAINST ('{$q}' WITH QUERY EXPANSION) ORDER BY date_created desc LIMIT {$offset},{$limit}";
		return $this->data_handler->query($query);
	}

	public function search_item($q, $offset = 0, $limit = 10)
	{
		$query = "SELECT * FROM messages $q LIMIT {$offset}, {$limit};";
		return $this->data_handler->query($query);
	}

	public function update_status($data)
	{
		$query  = "UPDATE messages SET status='".$data['status']."' WHERE id = '".$data['id']."'";
		$this->data_handler->query($query);
		//return $this->data_handler->query($query);	
	}

	public function add_messages($user_no,$addr,$name,$message,$source)
	{
		$data = '';
		$tm = $this->_time;
		$id = md5($this->_time.$name);
		$data .= "'{$id}',";
		if($addr != NULL){
			$addr = strip_tags(filter_var(trim($addr),FILTER_SANITIZE_ENCODED));
			$data .= " '{$addr}',";
		} else{
			$data .= " NULL,";
		}
		if($name != NULL){
			$name = strip_tags(filter_var(trim($name),FILTER_SANITIZE_ENCODED));
			$data .= " '{$name}',";
		} else{
			$data .= " NULL,";
		}
		$data .= " '{$user_no}',";
		$message = strip_tags(filter_var(trim($message),FILTER_SANITIZE_ENCODED));
		$data .= " '{$message}',";
		
		$data .= " {$tm}, {$tm}, NULL, 'pending' , '{$source}' ";

		return $this->data_handler->insert('messages',$data);
	}
}

?>