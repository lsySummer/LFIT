<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$time =  htmlspecialchars($_POST['time']);
$place =  htmlspecialchars($_POST['place']);
$info =  htmlspecialchars($_POST['info']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="insert into activity values(null,'$time','$place','$info')";
sqlite_query($db,$sql);
header("Location:../manager/activityManage.php");
exit();
?>