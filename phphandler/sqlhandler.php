<?php
//登录

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$db = sqlite_open("../lfit.db",0666,$sqliteerror);
//检测用户名及密码是否正确
$sql="select * from userBasic where uname='$username' and upass='$password' limit 1";
$res = sqlite_unbuffered_query($db,$sql);
if($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
	$iden = $item["uidentity"];
	switch($iden){
		case 0:
			header("Location:../manager/frameManager.html");
			break;
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
} else {
	echo "<script language=javascript>alert('用户名密码错误');
	history.back();</script>";
}



//注销登录
// if($_GET['action'] == "logout"){
//     unset($_SESSION['userid']);
//     unset($_SESSION['username']);
//     echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
//     exit;
// }

?>
