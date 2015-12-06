<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$userTo = $_POST ['placeSelect'];
$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
session_start ();
$user_id = $_SESSION ['gluid'];
$user_name = $_SESSION ['gluname'];
$dateToday = date ( "Y-m-d" );
// var_dump ( $_FILES );

// if ($_FILES["file"]["error"] > 0)
// {
// echo "error!" . $_FILES["file"]["error"] . "<br />";
// }
// else
// {
$i = 0;
$url = array ();
$type = array ();
foreach ( $_FILES ['file'] ['name'] as $name ) {
	$type [$i] = strstr ( $name, "." ); // 获取从"."到最后的字符
	$name = iconv ( "UTF-8", "gb2312", $name );
	$url [$i] = "feed/" . time () . $name;
	$i ++;
}
$i = 0;
foreach ( $_FILES ['file'] ['tmp_name'] as $tmp_name ) {
	move_uploaded_file ( $tmp_name, $url [$i] );
	$i ++;
}

$j = 0;
for($j = 0; $j < $i; $j ++) {
	if ($type [$j] == ".xls") {
		if ($userTo == - 1) {
			$sql = "select uname from userBasic where ucoaid='$user_id'";
			$res = sqlite_unbuffered_query ( $db, $sql );
			while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
				$userTo = $item ["uname"];
				$urls = "../filehandler/" . $url [$j];
				$sql = "insert into cexcelurl values('$userTo','$user_name','$dateToday','$urls')";
				sqlite_query ( $db, $sql );
			}
		} else {
			$urls = "../filehandler/" . $url [$j];
			$sql = "insert into cexcelurl values('$userTo','$user_name','$dateToday','$urls')";
			sqlite_query ( $db, $sql );
			fclose ( $handle );
		}
		echo "<script language=javascript>alert(''.$j.'上传成功');</script>";
		echo "已成功上传！";
	} elseif ($type [$j] == ".xml" || $type [$j] == ".txt") {
		$handle = fopen ( $url [$j], 'r' );
		$content = '';
		while ( ! feof ( $handle ) ) {
			$content .= fread ( $handle, 8080 );
		}
		if ($userTo == - 1) {
			$sql = "select uname from userBasic where ucoaid='$user_id'";
			$res = sqlite_unbuffered_query ( $db, $sql );
			while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
				$user_To = $item ["uname"];
				$sql = "insert into cfeedback values(null,'$user_To','$user_name','$dateToday','$content')";
				sqlite_query ( $db, $sql );
			}
		} else {

			$sql = "insert into cfeedback values(null,'$user_To','$user_name','$dateToday','$content')";
			sqlite_query ( $db, $sql );
			fclose ( $handle );
		}
		$file = $url [$j];
		$result = @unlink ( $file );
		echo "<script language=javascript>alert('上传成功');</script>";
		echo "已成功上传！";
	} else {
		echo "<script language=javascript>alert('上传格式不符合要求！请重新导入');
		history.back();</script>";
	}
}
?>