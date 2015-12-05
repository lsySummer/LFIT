<?php
$aid=$_GET["aid"];
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="select * from activity where aid='$aid'";
$res = sqlite_unbuffered_query($db,$sql);
if($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
	$time = $item["atime"];
	$place = $item["place"];
	$info = $item["info"];
	$response=$time.";".$place.";".$info;
}
echo $response;
?>