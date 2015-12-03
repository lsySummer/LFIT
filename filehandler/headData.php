<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
if ($_FILES["file"]["error"] > 0)
{
	echo "error!" . $_FILES["file"]["error"] . "<br />";
}
else
{
	$name = $_FILES["file"]["name"];
	$name = iconv("UTF-8","gb2312",$name);
	move_uploaded_file($_FILES["file"]["tmp_name"],
			"head/".time() . $name );
	$url = "../filehandler/head/" . time().$_FILES["file"]["name"];
	session_start();
	$user_id = $_SESSION['gluid'];
	$db = sqlite_open("../lfit.db",0666,$sqliteerror);
	$sql = "update userBasic set uimg='$url' where uid = '$user_id'";
	sqlite_query($db,$sql);
	echo "<script language=javascript>alert('修改成功');
	history.back();</script>";
}
?>