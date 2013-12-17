<?php
require_once dirname(__DIR__)."/tagrec/utils/utils.php";
class Tagrec_model extends Kiel_Model{
	public function recommendTags($msg,$count,$tolerance){	
		$msg = urldecode($msg);
		$msg = urldecode($msg);	
		$recommendedTags = findRecommendedTags($msg,$count,$tolerance);
		if(sizeof($recommendedTags)==0){
			echo "";
		} else {
			$str = "";
			$size = sizeof($recommendedTags);
			foreach($recommendedTags as $value) {
				$str.="{$value},";
			}
			$tags = trim($str,",");
			return array('tags'=>$tags);
		}
	}
}

?>