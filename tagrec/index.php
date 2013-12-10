<?php
include_once "utils.php";
if(isset($_POST['msg'])){
	$input = $_POST['msg'];
} else $input = "";
if(isset($_POST['count'])){
	$count = $_POST['count'];
} else $count = 0;
if(isset($_POST['tolerance'])){
	$tolerance = $_POST['tolerance'];
} else $tolerance = 0;

$recommendedTags = findRecommendedTags($input,$count,$tolerance);
if(sizeof($recommendedTags)==0){
	echo "No suggestions";
} else {
	$string = "";
	foreach ($recommendedTags as $value) {
		$string .= "{$value},";
	}
	echo trim($string, ",");
}