<?php 
error_reporting(E_ALL ^ E_NOTICE);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
//检测用户名及密码是否正确
$sql="select udate,count(uid) as num from userBasic group by udate order by udate";
$res = sqlite_unbuffered_query($db,$sql);
$userNum=array();
$udatearr=array();
$i=0;
while($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
	$num = $item["num"];
	$userNum[$i]=$num;
	$udate=$item["udate"];
	$udatearr[$i]=$udate;
	$i++;
}

$unum=array();
for($j=0;$j<$i;$j++){
	for($k=0;$k<=$j;$k++){
		$unum[$j]+=$userNum[$k];
	}
	$numadd=$numadd."".$unum[$j]."+".$udatearr[$j].";";
}
	echo $numadd;
?>