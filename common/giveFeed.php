	<!DOCTYPE html>
<html>
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <link href="../css/mycss/mycss.css" rel="stylesheet">


	
   </head>
   <body style="background-image:url('../image/bg.png');background-size:cover; ">
   <div style="width:880px;height:450px;">
		<div id="myAlert" class="alert alert-success">
		   <a href="#" class="close" data-dismiss="alert">&times;</a>
		   <strong>提示！</strong>您有新的未读消息！
		</div>
		
		<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
			<p style="margin-top:10px;font-size:15px">
				今日身体状况：体重60kg，心率100，血压120，80。睡眠时间7小时。
			</p>
			
			<div class="file-box";style="float:left;"> 
					<form action="../filehandler/todayData.php" method="post" enctype="multipart/form-data"> 
					<input type="file" name="file" id="fileField" size="20" style="float:left;margin-top:1%" /> 
					<input type="submit" class="btn-sm btn-default" name="submit" value="上传" style="float:left" /> 
					</form> 
			</div> 
			
			 <span class="label" style="background-color:#999999;margin-top:40px;margin-left:700px">2015.11.1</span>
			 <span class="label" style="background-color:#999999;">Cylong</span>
		</div>
		<!-- 第一个建议结束 -->
	</div>
				</script>   
			<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>