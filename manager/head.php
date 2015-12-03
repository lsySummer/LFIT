<!DOCTYPE html>
<html>
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
 
	<link rel="stylesheet" type="text/css" href="../css/mycss/healthManage.css">
	
	<style>
    #myModal
    {
        top:0%;
    }
</style>
	<script>
   $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
   </head>
    <body style="overflow-y:hidden">
	
	<div class="healthManage">
	
				<div style="float:left;margin-top:0.1%;margin-left:1%;">
			<img src="../image/logo.png" style="margin-right:80px"></img>
			 <span  class="healthfont">你好，管理员！</span>
			 <!--
			 <a href="#" class="healthfont"><img src="../image/mirror.png"  style="height:25px;" data-toggle="modal"  data-target="#myModal"/></a>
		-->
		</div>
	</div>
	  
	  	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal" aria-hidden="true">
								  &times;
							</button>
						   <form class="form-horizontal" id="formAction" action="head.html">
				
					   <span id="logSpan"></span>
				
				<div class="control-group" style="margin-top:10px">
					<form class="form-search">
						<input class="input-medium search-query" type="text" /> <button type="submit" class="btn">查找</button>
					</form>
				</div>
			</form>
						</div>
						
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-fade -->
	  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>
