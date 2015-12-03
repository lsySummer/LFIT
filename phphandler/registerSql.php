<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php

$username = htmlspecialchars($_POST['uname']);
$password = htmlspecialchars($_POST['upass']);
$identity = $_POST['uidentity'];
$goal = htmlspecialchars($_POST['ugoal']);
$dateToday = date("Y-m-d"); 
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$checksql = "select uid from userBasic where uname='$username'";
$res = sqlite_unbuffered_query($db,$checksql);


if ($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
	echo "<script language=javascript>alert('用户名重复！');
	history.back();</script>";
}else{
$sql="insert into userBasic values(null,'$username','$password','$identity','$goal',2,3,'$dateToday',
'../image/potrait.png',0,'$dateToday','','')";
sqlite_query($db,$sql);
$sql="select uid from userBasic where uname='$username'";
$res = sqlite_unbuffered_query($db,$sql);
if($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
	$user_id = $item["uid"];
}
session_start();
$_SESSION['gluid']=$user_id;
$_SESSION['gluname']=$username;
	switch($identity){
		case 1:
			header("Location:../person/frameperson.php");
			break;
		case 2:
			header("Location:../doctor/frameDoctor.php");
			break;
		case 3:
			header("Location:../coach/frameCoach.php");
			break;
	}
	exit();
}

?>