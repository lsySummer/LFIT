<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$toGroup= $_POST ['placeSelect'];
$info = $_POST ['info'];
$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
$dateToday = date("Y-m-d");
if ($_FILES["file"]["error"] > 0)
{
	echo "error!" . $_FILES["file"]["error"] . "<br />";
}
else
{
	$file_name="files";  //给上传文件命名
	$name=$_FILES['file']['name']; //获取客户端机器原文件的名称
	$type=strstr($name,"."); //获取从"."到最后的字符
	$name = $_FILES["file"]["name"];
	$name = iconv("UTF-8","gb2312",$name);
	$url = "feed/" .time() .$name;
	$db = sqlite_open("../lfit.db",0666,$sqliteerror);
	session_start();
	$user_id=$_SESSION['gluid'];
	$user_name = $_SESSION['gluname'];
	$dateToday = date("Y-m-d");
	move_uploaded_file($_FILES["file"]["tmp_name"],
			$url );
// 检测用户名及密码是否正确
// sqlite_query($db,"create table uinterest(uiid integer primary key,
// 		uid int(11) not null,inid int(11) not null);");
if ($toGroup == - 1) {
	$sql = "select iid from interest";
	$res = sqlite_unbuffered_query ( $db, $sql );
	while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
		$userTo=$item["iid"];
		$url = "../filehandler/".$url;
		$sql = "insert into upush values(null,'$userTo','$info','$url','$dateToday')";
		sqlite_query($db,$sql);
	}
} else {
		$url = "../filehandler/".$url;
		$sql = "insert into upush values(null,'$toGroup','$info','$url','$dateToday')";
		sqlite_query($db,$sql);
}
echo "<script language=javascript>alert('已成功发布！');</script>";
exit();
}
?>