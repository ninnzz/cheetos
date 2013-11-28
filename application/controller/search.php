<?php
class Search extends Kiel_Controller
{

	public function index_get()
	{
		$this->load_model('feed_model');

		$required = array('loc','name','message','query');
		$status_types = array('pending', 'flagged', 'approved');
		$data = $this->get_args;
		//check if nothing is passed and if a status is asked and it does not belong to the options
		//it will choose pending by default
		$data['status'] = isset($this->get_args['status'])?$this->get_args['status']:"pending";
		if(!in_array ( $data['status'] , $status_types, true)){
			$data['status'] = "pending";
		}
		
		$this->required_fields($required,$data);
		$d_query = urldecode($data['query']);

		$str = '';

		// made this and so that only all those status belonging to the passed parameter would be queried
		// watch out for the additional ")" in $str = 'WHERE '.$str .")"

		$str = "status = '". $data['status'] ."' AND (";
		if($data['loc'] === "1"){
			$str .= " place_tag like '%{$d_query}%' OR";
		}
		if($data['name'] === "1"){
			$str .= " sender like '%{$d_query}%' OR";
		}
		if($data['message'] === "1"){
			$str .= " message like '%{$d_query}%' OR";
		}
		$str .= "  tags like '%{$d_query}%' ";

		$str = rtrim($str, 'OR');

		if($str != ''){
			$str = 'WHERE '.$str . ")";
			$res = $this->feed_model->search_item($str, $data['offset'], $data['limit']);
		} else {
			$res = $this->feed_model->get_messages();
		}
		
		$this->response(array('status'=>'Success','data'=>$res),200);

	}

	public function tag_get()
	{
		$required = array('name');
		$data = $this->get_args;
		$this->required_fields($required,$data);
		$offset = isset($data['offset'])?$data['offset']:0;
		$limit = isset($data['limit'])?$data['limit']:10;
		$this->load_model('tag_model');

		$res = $this->tag_model->search_tag(urldecode($data['name']),$offset,$limit);
		$this->response(array('status'=>'Success','data'=>$res),200);

	}

	public function google_finder_get()
	{
		$q = $this->get_args['query'];

		$key = "smo7n6_B3sgRMD9Y";
  
        $url = "https://www.google.org/personfinder/2013-yolanda/api/search?key={$key}&q={$q}";

        $response   = file_get_contents($url);
        $data = preg_replace("/pfif\:/", "", $response);
        
        $xml = simplexml_load_string($data);

        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

//        if(count($array) > 0 && trim($array[0]) != "" ){
			$this->response(array('status'=>'Success','data'=>$array),200);
//		} else {
			// $this->response(array('status'=>'Success','data'=>'','query' => $url),200);
		// }
	}
}

?>

