<?php
$msg = "are communication services already restored in Camantang Can Avid,or is there anyway i can contact my aunt Trinidad Ballan Olalo or Douglas Ballan,Barangay Captain of Can-Avid Samar -09486075450.fernandeznoel49@gmail.com (Preferably before Dec 15, 2013) ";
$count = 3;
$tolerance = 0.30;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://localhost/tagrec/index.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            http_build_query(array('msg' => "{$msg}",
            						'count' => "{$count}",
            						'tolerance' => "{$tolerance}",

            	)));
// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
echo $server_output;
