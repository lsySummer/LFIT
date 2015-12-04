<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>第一php网提供的教程--向JS传递PHP数组</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script language=javascript>
function get_php_arr(arr){
alert(eval(arr));
}
</script>
</head>
<body>
<p>作者：遥远的期待 QQ:15624575</p>
<p>个人网站：www.phptogether.com</p>
<a href='javascript:get_php_arr("<?php echo json_encode(array(1,2,3))?>");'>向js传递PHP数组</a>
</body>
</html>
