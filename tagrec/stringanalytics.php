<?php
/*
 * This function starts out with several checks in an attempt to save time.
 *	 1.	The shorter string is always used as the "right-hand" string (as the size of the array is based on its length).	
 *	 2.	If the left string is empty, the length of the right is returned.
 *	 3.	If the right string is empty, the length of the left is returned.
 *	 4.	If the strings are equal, a zero-distance is returned.
 *	 5.	If the left string is contained within the right string, the difference in length is returned.
 *	 6.	If the right string is contained within the left string, the difference in length is returned.
 * If none of the above conditions were met, the Levenshtein algorithm is used.
 */
function LevenshteinDistance($s1, $s2) {
	$sLeft = (strlen($s1) > strlen($s2)) ? $s1 : $s2;
	$sRight = (strlen($s1) > strlen($s2)) ? $s2 : $s1;
	$nLeftLength = strlen($sLeft);
	$nRightLength = strlen($sRight);
	if ($nLeftLength == 0)
		return $nRightLength;
	else if ($nRightLength == 0)
		return $nLeftLength;
	else if ($sLeft === $sRight)
		return 0;
	else if (($nLeftLength < $nRightLength) && (strpos($sRight, $sLeft) !== FALSE))
		return $nRightLength - $nLeftLength;
	else if (($nRightLength < $nLeftLength) && (strpos($sLeft, $sRight) !== FALSE))
		return $nLeftLength - $nRightLength;
	else {
		$nsDistance = range(1, $nRightLength + 1);
		for ($nLeftPos = 1; $nLeftPos <= $nLeftLength; ++$nLeftPos)
		{
			$cLeft = $sLeft[$nLeftPos - 1];
			$nDiagonal = $nLeftPos - 1;
			$nsDistance[0] = $nLeftPos;
			for ($nRightPos = 1; $nRightPos <= $nRightLength; ++$nRightPos)
			{
				$cRight = $sRight[$nRightPos - 1];
				$nCost = ($cRight == $cLeft) ? 0 : 1;
				$nNewDiagonal = $nsDistance[$nRightPos];
				$nsDistance[$nRightPos] =
					min($nsDistance[$nRightPos] + 1,
							$nsDistance[$nRightPos - 1] + 1,
							$nDiagonal + $nCost);
				$nDiagonal = $nNewDiagonal;
			}
		}
		return $nsDistance[$nRightLength];
	}
}

function getAverageDifference($str2, $str1) {
	$distance = LevenshteinDistance($str2, $str1);
	$l1 = strlen($str1);
	$l2 = strlen($str2);
	return (($distance/$l1) + ($distance/$l2)) / 2;
}

function isInArrayInexactString($string, $array, $tolerance = 0){
	foreach ($array as $value) {
		if (getAverageDifference($string,$value) <= $tolerance){
			return 1;
		}
	}
	return 0;
}


function getSynonyms($word) {
	$apikey = "rYrfI1LaQJQGi6j8p9KA";
	$language = "en_US"; // you can use: en_US, es_ES, de_DE, fr_FR, it_IT 
	$endpoint = "http://thesaurus.altervista.org/thesaurus/v1";

	$synonyms = "{$word}|";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "$endpoint?word=".urlencode($word)."&language=$language&key=$apikey&output=json"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$data = curl_exec($ch); 
	$info = curl_getinfo($ch); 
	curl_close($ch);

	if ($info['http_code'] == 200) {
		$result = json_decode($data, true); 
		foreach ($result["response"] as $value) { 
			$newWords = $value["list"]["synonyms"];
			$synonyms .= "{$synonyms}{$newWords}|"; 
		}
		$list = explode("|",$synonyms);
		$list = array_values(array_unique($list));
		array_pop($list);
	} else {
		echo "Http Error: ".$info['http_code'];
		return array($word);
	}
	return $list;
}

?>