<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
// uaid integer primary key,
// 		uid int(11) not null,acid int(11) not null
session_start();
$user_id = $_SESSION['gluid'];
$user_name = $_SESSION['gluname'];
$sql ="select * from uactivity where uid='$user_id' and acid='$acId'";
$res = sqlite_unbuffered_query ( $db, $sql );
if ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
	echo "<script language=javascript>alert('您已加入该活动，不可重复加入！');
	history.back();</script>";
}else{
$sql="insert into uactivity values(null,'$user_id','$acId')";
sqlite_query($db,$sql);
header("Location:../common/myActivity.php");
exit();
}
?>