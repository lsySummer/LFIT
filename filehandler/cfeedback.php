<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$userTo = $_POST['placeSelect'];

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
if($type==".xls"){
	if($userTo==-1){
	$sql = "select uname from userBasic where ucoaid='$user_id'";
		$res = sqlite_unbuffered_query ( $db, $sql );
		while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
			$userTo=$item["uname"];
			$url = "../filehandler/".$url;
			$sql = "insert into cexcelurl values('$userTo','$user_name','$dateToday','$url')";
			sqlite_query($db,$sql);
		}
	}
	else{
		$sql = "insert into cexcelurl values('$userTo','$user_name','$dateToday','$url')";
		sqlite_query($db,$sql);
		fclose($handle);
	}
	echo "<script language=javascript>alert('上传成功');
	history.back();</script>";
}
elseif($type==".xml"||$type==".txt"){
	$handle = fopen($url, 'r');
	$content = '';
	while(!feof($handle)){
		$content .= fread($handle, 8080);
	}
	if($userTo==-1){
		$sql = "select uname from userBasic where ucoaid='$user_id'";
		$res = sqlite_unbuffered_query ( $db, $sql );
		while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
			$userTo=$item["uname"];
			$sql = "insert into cfeedback values(null,'$userTo','$user_name','$dateToday','$content')";
			sqlite_query($db,$sql);
		}
	}
	else{
	$sql = "insert into cfeedback values(null,'$userTo','$user_name','$dateToday','$content')";
	sqlite_query($db,$sql);
	fclose($handle);	
	}
	$file =$url;
	$result = @unlink ($file);
	echo "<script language=javascript>alert('上传成功');
	history.back();</script>";
}else{
	echo "<script language=javascript>alert('上传格式不符合要求！请重新导入');
	history.back();</script>";
}
}
?>