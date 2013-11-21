<?php
class Tag extends Kiel_Controller
{
	/**
	 *	@return json_object - all the possible tags
	**/
	public function index_get(){

	}



	public function index_put(){
		$required = array('tags','post_id','app_id');

		$this->required_fields($required,$this->put_args);
		$this->checkAuth($this->put_args['app_id']);
		
		$this->load_model('tag_model');
		$res = $this->tag_model->update_tag($this->put_args['tags'],$this->put_args['post_id']);
		
		$this->response(array('status'=>'Success','data'=>$res),200);

	}



}

?>

