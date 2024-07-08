<?php

function encode($string,$key) {
    $j =0;
    $hash =0;
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string,$i,1));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
    }
    return $hash;
}

function decode($string,$key) {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
        if ($j == $keyLen) { $j = 0; }
        $ordKey = ord(substr($key,$j,1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    return $hash;
}
$url = 'localhost/payincentive.php';
$encode_phone = encode('0811422485',"w-e-b-r-d-s") ;
$fields = [
    'rds_code'      => '3ncLK',
    'm_phone' => $encode_phone,
	'pay_type' => 'R',
    'pay_value'         => '50'
];

$fields_string = http_build_query($fields);




		  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL,$url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			  curl_setopt($ch, CURLOPT_POST, true);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			  $result = curl_exec($ch);		
echo $result;
?>

