<?php
class Tagrec extends Kiel_Controller {
	public function index_get()
	{
		$this->load_model('tagrec_model');
		$this->required_fields(array('msg'),$this->get_args);
		$msg = isset($this->get_args['msg'])?$this->get_args['msg']:"";
		$count = isset($this->get_args['count'])?$this->get_args['count']:2;
		$tolerance = isset($this->get_args['tolerance'])?$this->get_args['tolerance']:0;		
		$res = $this->tagrec_model->recommendTags($msg,$count,$tolerance);
		$this->response(array('status'=>'Success','data'=>$res),200);
	}
}

?>

