<?php
$psecode = 'NDE005';
$website = 'www.baidu.com';
$amt = 1;
$pwd = 123456;
$ch = curl_init();
$curl_url = "http://localhost:81/flandy/getpost2.php?web=" . $website .
"&pwd=" . $pwd . "&action=check&pseid=" . $psecode .
"&amt=" . $amt;
curl_setopt($ch, CURLOPT_URL, $curl_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不直接输出，返回到变量
$curl_result = curl_exec($ch);
$result = explode(',', $curl_result);
curl_close($ch);
print_r($result);
?>