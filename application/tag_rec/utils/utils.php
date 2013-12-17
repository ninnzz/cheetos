<?php
include_once __DIR__."/stringanalytics.php";
function getTagSynonymsArray(){
	$tagSynonymstxt = file_get_contents(dirname(__DIR__)."/tags/reliefboard.txt");
	$tagSynonymsarr = explode("\n", $tagSynonymstxt);
	$tagCount = sizeof($tagSynonymsarr);
	for($i=0;$i<$tagCount;$i++){
		$tagSynonymsArrays[] = array_map("rtrim", explode(",",$tagSynonymsarr[$i]));
	}
	return $tagSynonymsArrays;
}

function getStopWords() {
	$stopWordsTxt = file_get_contents(dirname(__DIR__)."/stopwords/stopwords_en.txt");
	return array_map("rtrim", explode("\n",strval($stopWordsTxt)));
}

function quick_array_diff($a, $b) {
    $map = $out = array();
    foreach($a as $val) $map[$val] = 1;
    foreach($b as $val) unset($map[$val]);
    return array_keys($map);
}

function findRecommendedTags($input,$count = 2,$tolerance = 0){
	$alpha = strtolower(preg_replace("/[^a-zA-Z ]+/", "", $input));	
	$words = array_filter(array_values(explode(" ", $alpha)));
	$stopWords = getStopWords();
	$filteredWords = quick_array_diff($words, $stopWords);
	$tagSynonyms = getTagSynonymsArray();
	//count the occurence
	$tagCount = sizeof($tagSynonyms);
	$wordCount = sizeof($filteredWords);
	for($i=0;$i<$tagCount;$i++){	
		$occurence[$i] = 0;
		for($j=0;$j<$wordCount;$j++){
			//TODO: Refine comparison algo
			if(isInArrayInexactString($filteredWords[$j],$tagSynonyms[$i],$tolerance)){
				$occurence[$i]++;
			}
		}
	}
	//get highest scorers
	arsort($occurence);
	foreach (array_keys($occurence, 0, true) as $key) {
    	unset($occurence[$key]);
	}
	$tagIndices = array_keys($occurence);
	//get tags
	$recommendedTags = array();
	foreach ($tagIndices as $value) {
		$recommendedTags[] = $tagSynonyms[$value][0];
	}
	$recommendedTags = array_slice($recommendedTags,0,$count);
	return $recommendedTags;
}