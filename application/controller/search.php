<?php
class Search extends Kiel_Controller
{

	public function index_get()
	{
		$required = array('loc','name','message','query');
		$data = $this->get_args;
		$this->required_fields($required,$data);

		$str = '';
		if($data['loc'] !== "1"){
			$str .= " place_tag like %'{$data['query']}'% AND";
		}
		if($data['name'] !== "1"){
			$str .= " sender like %'{$data['query']}'% AND";
		}
		if($data['message'] !== "1"){
			$str .= " message like %'{$data['query']}'%";
		}

		if($str != ''){
			
		}



	}

}

?>

