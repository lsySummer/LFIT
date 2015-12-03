<?php

		$random = rand(1, 100);
		$hrarr=array();
		$bparrH = array();
		$bparrL = array();
		$goalarr = array();
		$dsleeparr = array();
		$ssleeparr = array();
		for($i = 0; $i < 5000; $i++)
		{
			$random = rand(80, 130);
			$hrarr[$i]=$random;
			$randHrH = rand(90,120);
			$bparrH[$i] = $randHrH;
			$randHrL = rand(60,90);
			$bparrL[$i] = $randHrL;
			$randGoal = rand(1,10);
			$goalarr[$i]=$randGoal;
			$random = rand(1,5);
			$dsleeparr[$i]=$random;
			$random = rand(3,6);
			$ssleeparr[$i]=$random;
		}
		for($i = 0; $i < count($hrarr); $i++){
			echo $hrarr[$i];
			echo "\n";
		}

	$_fp = @fopen('2.xml','w');
	if(!$_fp){
		exit('系统错误，文件不存在！');
	}
	flock($_fp,LOCK_EX);
	$_string = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "<abc>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	for($i=0;$i<count($hrarr);$i++){
	$_string = "\t<item>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<hr>$hrarr[$i]</hr>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<bph>$bparrH[$i]</bph>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<bpl>$bparrL[$i]</bpl>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<goal>$goalarr[$i]</goal>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<dsleep>$dsleeparr[$i]</dsleep>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t\t<ssleep>$ssleeparr[$i]</ssleep>\r\t";
	fwrite($_fp, $_string,strlen($_string));
	$_string = "\t</item>";
	fwrite($_fp, $_string,strlen($_string));
	}
	$_string = "</abc>";
	fwrite($_fp, $_string,strlen($_string));
	flock($_fp,LOCK_UN);
	fclose($_fp);
	echo "over";
?>