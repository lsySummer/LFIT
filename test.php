<html>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<body>
 <?php 
 $a=30;
 ?>

<script type="text/javascript">
 var a = <?php echo $a;?>;
 window.alert(a);

</script>
</body>
</html>

 for(var i=0;i<7;i++){
	a[i] = <?php echo $goalarr[i];?>;
	}
<form action="../filehandler/todayData.php" method="post"
					enctype="multipart/form-data">
					<input type="file" name="file" id="fileField" size="20"
						style="float: left; margin-top: 1%" /> <input type="submit"
						class="btn-sm btn-default" name="submit" value="上传"
						style="float: left" />
				</form>
				
				<div id="myAlert" class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>提示！</strong>您有新的未读消息！
		</div>
		
			 <span class="label" style="background-color:#999999;margin-top:40px;margin-left:700px">
							<?php echo $date?></span>
						 <span class="label" style="background-color:#999999;">
							<?php echo "doctor ".$dname?></span>
							
							
							
