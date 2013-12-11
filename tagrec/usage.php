<?php
$msg = "Report from Jocelyn Joy Hinola Gella who works for the Municipal Government of Cuartero, Capiz Barangay Agcabugao : 109 homes completely damaged, 70 partially Barangay Agdahon: 249 completely damaged, 141 partially Barangay Angub: 253 completely damages, 97 partially Barangay Agnaga: 102 completely, 54 Partially Barangay Balingasag: 116 completely, 78 Partially Bgy Bitoon Ilawod: completely 63, partially 118 Bgy Bitoon Ilaya: completely 122, partially 102 Bgy Bunod: completely 178, partially 53 Bgy Carataya: completely 106, partially 116 Bgy Lunayan: completely 136, partially d. 17 Bgy Mahabang Sapa: completely 38, partially 38 Bgy Mahunod hunod: completely 133, partially 178 Bgy Maindang: completely 186, partially 129 Bgy Mainit: completely 136, partially 70 Bgy Malagabi: completely 189, partially 144 Bgy Nagba: completely 136, partially 194 Bgy Ilawod: completely 22, partially 184 Bgy Poblacion Ilaya: completely 70, partially 154 Bgy Takas: completely 129, partially 193 Bgy Putian: completely 102 partially 154 Bgy San Antonio: completely 66, partially 65 Bgy Sinabsaban: completely 94, partially 130 So many have lost their homes; 2,675 houses were completely damaged! 2,479 homes were partially damaged. They have no electricity and they were told that this will be restored in January at the earliest (they hope). Some relief goods have reached the town but it is still not sufficient for all that were affected specially in the upland Barangays. The homes of the Mayor and Vice-Mayor were also damaged by the typhoon. The municipality has a a generator and they allow people to charge their phones and rechargeable lights. There is limited cellphone service and the signal is available near the municipal hall. Joy is suggesting that we send generators or rechargeable flashlights. Perhaps we can send building materials and tools; nails, hammers, saws etc. Additional food is also needed as all the farms and crops were destroyed. ";
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
