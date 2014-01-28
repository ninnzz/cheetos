<?php

	header('Content-Type: application/json');
	header('HTTP/1.1: 200');
	header('Status: 200');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: OPTIONS, DELETE, PUT');
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

	try {
		if(!(isset($_GET['url']) && !empty($_GET['url']))){
			throw new Exception("Missing URL parameter", 1);
		}

		$tags = get_meta_tags($_GET['url']);
		if(!$tags){
			throw new Exception("Cannot find website/url", 1);
		}
		if(gettype($tags) !== "array" ){
			throw new Exception("Cannot find video website/url", 1);
		}
		if(count($tags) < 1){
			throw new Exception("Cannot find video website/url", 1);
		}
		if(!isset($tags['attribution'])){
			exit(json_encode(array('success'=>'Video might not belong to any network','has_network'=>0)));
		}

		exit(json_encode(array('success'=>'Video belongs to a network','has_network'=>1,'network'=>'http://youtube.com/'.$tags['attribution'])));
		
	} catch(Exception $e) {
		exit(json_encode(array('error'=>$e->getMessage())));
	}