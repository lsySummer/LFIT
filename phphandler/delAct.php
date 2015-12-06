<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
// sqlite_query($db,"create table uactivity(uaid integer primary key,
// 		uid int(11) not null,acid int(11) not null);");
$sql="delete from activity where aid='$acId'";
sqlite_query($db,$sql);
$sql="delete from uactivity where acid='$acId'";
sqlite_query($db,$sql);
header("Location:../manager/allActivity.php");
exit();
?>