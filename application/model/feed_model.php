<?php
class Feed_model extends Kiel_Model{

	public function get_messages($parent_id = null, $offset = 0, $limit = 10,$source)
	{ 
		if($parent_id !== NULL){
			$where = " WHERE status != 'flagged' AND parent_id is not null ";  
		}
		else{
			$where = " WHERE status != 'flagged' AND parent_id is NULL ";	
		}
		if($source !== NULL){
			$source = $this->data_handler->get_where('applications',null," WHERE app_code = '{$source}' ",null,null,null,'date_created','');
		
			if($source->data->result_count != 0){
				print_r($source->data->result);
				die();
				$s = $source->data->result[0]->id;
				$where .= " and source = '{$s}' ";
			} else{
				return array('result'=>array(),'result_count'=>0);
			}
		}

		$added = " ,(select logo from applications where applications.id = messages.source) as logo, (select name from applications where applications.id = messages.source) as app_name ";
		return $this->data_handler->get_where('messages',null,$where,$offset,$limit,null,'date_created',$added);
	}
	
	public function single_item($id)
	{
		return $this->data_handler->get_where('messages',null," WHERE id = '{$id}' ",null,null,null,'date_created','');
	}

	public function search($q, $offset = 0, $limit = 10)
	{
		$query  = "SELECT * FROM messages WHERE MATCH (sender,message,place_tag,sender_number) AGAINST ('{$q}' WITH QUERY EXPANSION) ORDER BY date_created desc LIMIT {$offset},{$limit}";
		return $this->data_handler->query($query);
	}

	public function search_item($q, $offset = 0, $limit = 10)
	{
		$query = "SELECT * FROM messages $q ORDER BY date_created desc LIMIT {$offset}, {$limit};";
		return $this->data_handler->query($query);
	}

	public function update_status($data)
	{
		$query  = "UPDATE messages SET status='".$data['status']."' WHERE id = '".$data['id']."'";
		$res = $this->data_handler->query($query);
		//return $this->data_handler->query($query);	
	}

	public function add_messages($user_no,$addr,$name,$message,$source,$source_type,$parent_id)
	{
		$data = '';

		$tm = $this->_time;
		$id = md5($this->_time.$name);
		$data .= "'{$id}',";

		if(!empty($parent_id)){
			$data .= " '{$parent_id}',"; 
		}
		else{
			$data .= " NULL,";
		}

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
		
		$data .= " {$tm}, {$tm}, NULL, 'pending' , '{$source}'  ";

		if($source_type != NULL){
			$data .= " ,'{$source_type}'";
		} else{
			$data .= " ,NULL";
		}
		$res = $this->data_handler->insert('messages',$data);
		$res['id'] = $id;
		return $res;
	}
}

?>