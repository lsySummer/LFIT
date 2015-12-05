<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="delete from uinterest where uiid='$acId'";
sqlite_query($db,$sql);
header("Location:../common/myInterest.php");
exit();
?>