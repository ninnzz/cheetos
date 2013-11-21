<?php
class Tag_model extends Kiel_Model{

	public function update_tag($tags,$post_id){

		$where = array('id'=>$post_id);  
		return $this->data_handler->update_where('messages',array('tags'=>$tags),$where);

	}
}

?>