<!DOCTYPE html>
<html>
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
 
	<link rel="stylesheet" type="text/css" href="../css/mycss/healthManage.css">
	

	<script>
   $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
   </head>
   <body style="overflow-y:hidden">
	
	<div class="healthManage">
	
		<div style="float:left;margin-top:0.1%;margin-left:1%;">
			 <a href="../coach/frameCoach2.php" target="frame2" class="healthfont">首页</a>
			 <a href="../common/info.php" target="frame2" class="healthfont" data-toggle="tooltip" data-placement="bottom" title="">
			  <?php
			 session_start();
			 $user_name = $_SESSION['gluname'];
			 $user_id = $_SESSION['gluid'];
			 echo $user_name;
			 ?> 
			 <span class="badge">
			  <?php 
			 $db = sqlite_open("../lfit.db",0666,$sqliteerror);
			 $checksql = "select * from userBasic where uid ='$user_id'";
			 $res = sqlite_unbuffered_query($db,$checksql);
			 $dateToday = date("Y-m-d");
			 if($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
			 	$udate = $item["udate"];
			 	$minus=abs($dateToday-$udate)/86400;
			 	echo "您已健康管理".$minus."天";
			 }
			 ?>
			 </span></a>
			<img src="../image/logo.png" style="margin-right:100px"></img>
			
		</div>
	</div>
	  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>
