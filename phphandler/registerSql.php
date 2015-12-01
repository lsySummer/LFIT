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
	switch($identity){
		case 1:
			header("Location:../person/frameperson.html");
			break;
		case 2:
			header("Location:../doctor/frameDoctor.html");
			break;
		case 3:
			header("Location:../coach/frameCoach.html");
			break;
	}
	exit();
}
// $sql="insert into userBasic values(null,$username,$password,$identity,$goal,2,3,$dateToday)";
// sqlite_query($db,$sql);

?>