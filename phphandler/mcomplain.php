<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$touser =  htmlspecialchars($_POST['touser']);
$todc =  htmlspecialchars($_POST['todc']);
$acId =  htmlspecialchars($_POST['acId']);
echo $acId;
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="select * from complain where cid='$acId'";
$res2 = sqlite_unbuffered_query ( $db, $sql );
if ( $item = sqlite_fetch_array ( $res2, SQLITE_ASSOC ) ) {
	$uid=$item["uid"];
	$toid=$item["toid"];
}
// $sql="select uname from userBasic where uid='$uid'";
// $res2 = sqlite_unbuffered_query ( $db, $sql );
// if ( $item = sqlite_fetch_array ( $res2, SQLITE_ASSOC ) ) {
// 	$uname=$item["uname"];
// }
// $sql="select uname from userBasic where uid='$toid'";
// $res2 = sqlite_unbuffered_query ( $db, $sql );
// if ( $item = sqlite_fetch_array ( $res2, SQLITE_ASSOC ) ) {
// 	$uname=$item["uname"];
// }
$dateToday = date("Y-m-d");
$sql="insert into unews values(null,'$uid','$dateToday','$touser')";
sqlite_query($db,$sql);
$sql="insert into unews values(null,'$toid','$dateToday','$todc')";
sqlite_query($db,$sql);
echo "<script language=javascript>alert('处理成功！');
	history.back();</script>";
?>
