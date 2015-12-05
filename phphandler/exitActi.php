<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="delete from uactivity where uaid='$acId'";
sqlite_query($db,$sql);
header("Location:../common/myActivity.php");
exit();
?>