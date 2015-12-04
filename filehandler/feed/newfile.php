<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<?php
$file = '1449228954haha.xml';
$result = @unlink ($file);
if ($result == false) {
	echo '蚊子赶走了';
} else {
	echo '无法赶走';
}
?>