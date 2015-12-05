<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$time = htmlspecialchars($_POST['time1']);
$place = htmlspecialchars($_POST['place1']);
$info = htmlspecialchars($_POST['info1']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="update activity set atime = '$time',place = '$place',info='$info' where aid='$acId'";
sqlite_query($db,$sql);
header("Location:../manager/activityManage.php");
?>