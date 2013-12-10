<?php
include_once "utils.php";
if(isset($_GET['tag'])){
	$tag = $_GET['tag'];
} else $tag = "";

$tags = getTagSynonymsArray();
echo "recommendable tags <br/>";
echo "<pre>";
foreach ($tags as $value) {
	echo $value[0]."<br/>";
}
$csv = arrayToCSV(getSynonyms($tag));

$myFile = "tagsynonyms.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $csv;
fwrite($fh, "\n".$stringData);
fclose($fh);
echo "</pre>";
