<?php
$perNum =  htmlspecialchars($_POST['perNum']);
$place =  htmlspecialchars($_POST['place']);
$info =  htmlspecialchars($_POST['info']);
echo $perNum." ".$place." ".$info;
$db = sqlite_open("../lfit.db",0666,$sqliteerror);
$sql="insert into interest values(null,'$place','$info','$perNum')";
sqlite_query($db,$sql);
header("Location:../manager/allInterest.php");
exit();
?>