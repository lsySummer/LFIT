<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$sexOption = $_POST['sexOption'];
$place = $_POST['placeSelect'];
$goal = $_POST['goal'];
$sport =  htmlspecialchars($_POST['word']);
$date = $_POST['datePicker'];
session_start();
$user_id = $_SESSION['gluid'];
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql = "select * from userBasic where uid='$user_id'";
$res = sqlite_unbuffered_query($db,$sql);
if($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
	$iden = $item["uplace"];
	$word = $item["uword"];
}
$sql = "update userBasic set usex='$sexOption' where uid = '$user_id'";
sqlite_query($db,$sql);
$sql = "update userBasic set uplace='$place' where uid = '$user_id'";
sqlite_query($db,$sql);
$sql = "update userBasic set ugoal='$goal' where uid = '$user_id'";
sqlite_query($db,$sql);
$sql = "update userBasic set uword='$sport' where uid = '$user_id'";
sqlite_query($db,$sql);
$sql = "update userBasic set ubirth='$date' where uid = '$user_id'";
sqlite_query($db,$sql);

echo "<script language=javascript>alert('修改成功');
	history.back();</script>";
?>