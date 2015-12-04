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
			 <a href="../doctor/frameDoctor2.php" target="frame2" class="healthfont">首页</a>
			 <a href="../common/info.php" target="frame2" class="healthfont" data-toggle="tooltip" data-placement="bottom" title="您当前的全国排名为第50位">
			  <?php
			 session_start();
			 $user_name = $_SESSION['gluname'];
			 echo $user_name;
			 ?> 
			 <span class="badge">V50</span></a>
			<img src="../image/logo.png" style="margin-right:80px"></img>
			 
		</div>
	</div>
	  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>
