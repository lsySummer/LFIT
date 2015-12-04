<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$userTo = $_POST['placeSelect'];

if ($_FILES["file"]["error"] > 0)
{
	echo "error!" . $_FILES["file"]["error"] . "<br />";
}
else
{
	$name = $_FILES["file"]["name"];
	$name = iconv("UTF-8","gb2312",$name);
	$url = "feed/" .time() .$name;
	move_uploaded_file($_FILES["file"]["tmp_name"],
			$url );
	$handle = fopen($url, 'r');
	$content = '';
	while(!feof($handle)){
		$content .= fread($handle, 8080);
	}
	session_start();
	$user_id=$_SESSION['gluid'];
	$user_name = $_SESSION['gluname'];
	$db = sqlite_open("../lfit.db",0666,$sqliteerror);
	$dateToday = date("Y-m-d");
	if($userTo==-1){
		$sql = "select uname from userBasic where udocid='$user_id'";
		$res = sqlite_unbuffered_query ( $db, $sql );
		while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
			$userTo=$item["uname"];
			$sql = "insert into dfeedback values(null,'$userTo','$user_name','$dateToday','$content')";
			sqlite_query($db,$sql);
		}
	}
	else{
	$sql = "insert into dfeedback values(null,'$userTo','$user_name','$dateToday','$content')";
	sqlite_query($db,$sql);
	fclose($handle);	
	}
	echo "<script language=javascript>alert('上传成功');
	history.back();</script>";
}
?>