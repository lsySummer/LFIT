<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$acId =  htmlspecialchars($_POST['acId']);
echo $acId;
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="delete from activity where aid='$acId'";
sqlite_query($db,$sql);
header("Location:../manager/allActivity.php");
exit();
?>