<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
if ($_FILES["file"]["error"] > 0)
{
	echo "error!" . $_FILES["file"]["error"] . "<br />";
}
else
{
	echo "文件名: " . $_FILES["file"]["name"] . "<br />";
	echo "类型: " . $_FILES["file"]["type"] . "<br />";
	echo "大小: " . ($_FILES["file"]["size"] / 1024) . " KB<br />";
	echo "存储位置:" . $_FILES["file"]["tmp_name"] ;
}
if (file_exists("upload/" . $_FILES["file"]["name"]))
{
	echo $_FILES["file"]["name"] . "文件已经存在. ";
}
else
{
	$name = $_FILES["file"]["name"];
	$name = iconv("UTF-8","gb2312",$name);
	echo "upload/" . $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],
			"upload/" . $name .time());
	echo "文件已经被存储到: " . "upload/" . $_FILES["file"]["name"];
}
?>