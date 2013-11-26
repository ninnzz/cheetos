<?php
class Tag_model extends Kiel_Model{

	public function update_tag($tags,$post_id)
	{
		$where = array('id'=>$post_id);  
		return $this->data_handler->update_where('messages',array('tags'=>$tags),$where);
	}

	public function get_tag($id)
	{
		return $this->data_handler->get_where('messages',array('tags'),array('id'=>$id),null,null,null,'date_created','');
	}

	public function search_tag($tag,$offset=0,$limit=0)
	{
		$query = "SELECT * FROM messages where tags like '%{$tag}%' ORDER BY date_created desc LIMIT {$offset}, {$limit};";
		return array('q'=>$query,'res'=>$this->data_handler->query($query));
	}
}

?>