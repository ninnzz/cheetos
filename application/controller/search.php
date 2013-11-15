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
			$res = $this->feed_model->search_item($str, $data['offset'], $data['limit']);
		} else {
			$res = $this->feed_model->get_messages();
		}
		
		$this->response(array('status'=>'Success','data'=>$res),200);

	}

	public function google_finder_get()
	{
		$key = "smo7n6_B3sgRMD9Y";
		$q = $this->get_args['query'];

		$endpoint = "https://www.google.org/personfinder/2013-yolanda/api/search?key={$key}&q={$q}";


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$endpoint);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	$retValue = curl_exec($ch);			 
	curl_close($ch);
	
//	header('Content-type: application/xml');
	echo $retValue;

	// $oXML = new SimpleXMLElement($retValue);

	// foreach($oXML->entry as $oEntry){
	// 	echo $oEntry->title . "<br/>";
	// }


		// $res = file_get_contents($endpoint);

		// print_r($res);

		// $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));

		// $xml = file_get_contents($endpoint, false, $context);
		// print_r(json_decode($xml));
		// $xml = simplexml_load_string($xml);

//		$fileContents = file_get_contents($endpoint);


		// $simpleXml = simplexml_load_file($endpoint);


		// $res = json_encode($simpleXml);


		// $this->response(array('status'=>'Success','data'=>$res),200);

	}
}

?>

