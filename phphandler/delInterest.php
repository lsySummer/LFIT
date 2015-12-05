<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="delete from interest where iid='$acId'";
sqlite_query($db,$sql);
header("Location:../manager/allInterest.php");
exit();
?>