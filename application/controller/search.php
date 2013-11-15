<?php
class Search extends Kiel_Controller
{

	public function index_get()
	{
		$this->load_model('feed_model');

		$required = array('loc','name','message','query');
		$data = $this->get_args;
		$this->required_fields($required,$data);

		$str = '';
		if($data['loc'] === "1"){
			$str .= " place_tag like '%{$data['query']}%' OR";
		}
		if($data['name'] === "1"){
			$str .= " sender like '%{$data['query']}%' OR";
		}
		if($data['message'] === "1"){
			$str .= " message like '%{$data['query']}%'";
		}

		$str = rtrim($str, 'OR');

		if($str != ''){
			$str = 'WHERE '.$str;
			$res = $this->feed_model->search_item($str);
		} else {
			$res = $this->feed_model->get_messages();
		}
		
		$this->response(array('status'=>'Success','data'=>$res),200);

	}

	public function google_finder_get()
	{
		//https://www.google.org/personfinder/2013-yolanda/api/search?key=smo7n6_B3sgRMD9Y&q=mj
	}
}

?>

