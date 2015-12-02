<?php
$xml_array=simplexml_load_file('health.xml'); //将XML中的数据,读取到数组对象中 
foreach($xml_array as $tmp){ 
echo $tmp->name ."-". $tmp->step. "-" .$tmp->hr.  "-" .$tmp->bp . "-" .$tmp->weight 
. "-" .$tmp->dsleep. "-" .$tmp->ssleep. "<br>"; 
} 
?>