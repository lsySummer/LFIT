<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$index= $_POST ['placeSelect'];
$info = $_POST ['info'];
$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
session_start();
$user_id=$_SESSION['gluid'];
$user_name = $_SESSION['gluname'];
$sql = "select udocid,ucoaid from userBasic where uid='$user_id'";
$res = sqlite_unbuffered_query ( $db, $sql );
if ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
	if($index==0){
	$userTo=$item["udocid"];
	}else{
	$userTo=$item["ucoaid"];
	}
}

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
	$url = "../filehandler/".$url;
	move_uploaded_file($_FILES["file"]["tmp_name"],
			$url );
		$sql = "insert into complain values(null,'$user_id','$userTo','$info','$url')";
		sqlite_query($db,$sql);
// 	echo "<script language=javascript>alert('已成功发送给管理员！');</script>";
   echo "已成功发送给管理员！";
}

?>