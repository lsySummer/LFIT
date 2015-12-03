<!DOCTYPE html>
<html>

<head>

  <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	
	
    <link href="../css/mycss/mycss.css" rel="stylesheet">
 <style>
    #myModal
    {
        top:10%;
    }
	</style>
	
	</head>

<body  style="background-image:url('../image/bg.png');background-size:cover; ">
	

						<div class="activity">
							<a href="#"><img class="addPic" src="../image/add.png" data-toggle="modal"  data-target="#myModal"></img></a>
						
						</div>
						<div class="activity">
							<img class="acImg" src="../image/activity2.jpg"></img>
							<p class="acP">人数：11人<br/>地点：宿舍<br/>羽毛球兴趣组，来约吧！</p>
							<button class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal2">删除兴趣组</button>
						</div>
						<div class="activity">
							<img class="acImg" src="../image/activity2.jpg"></img>
							<p class="acP">人数：8人<br/>地点：宿舍<br/>双十一到了！快来乒乓球兴趣组玩耍！</p>
							<button class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal2">删除兴趣组</button>
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
						   
						</div>
						<div class="modal-body" style="height:280px;">
						<div style="width:700px;height:40px">
							<div style="margin:5px 15px;width:100px;text-align:right;float:left">
								<span class="infoTxt">人数</span><br/>
							</div>
							<div style="margin:5px 3px;float:left;text-align:left;float:left">
								<input type="text" id="name" ></input>
							</div>
						</div>
							<div style="width:700px;height:40px">
								<div style="margin:5px 15px;width:100px;text-align:right;float:left">
									<span class="infoTxt">地点</span><br/>
								</div>
								<div style="margin:5px 3px;float:left;text-align:left;float:left">
									<input type="text" id="name" ></input>
								</div>
							</div>
						<div style="width:700px;height:120px;margin-top:10px">
							<div style="margin:5px 15px;width:100px;text-align:right;float:left">
								<span class="infoTxt">描述</span><br/>
							</div>
							<div style="margin:5px 3px;float:left;float:left;">
								
								<textarea cols="6" rows="10" style="width:250px;height:120px"></textarea><br/>
							</div>
						</div>
						
						</div>
					
						<div class="modal-footer" style="text-align:center">
							<button type="button" class="btn btn-default" 
							   data-dismiss="modal">取消
							</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">
							   确定
							</button>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-fade -->
			
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" 
			   aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal" aria-hidden="true">
								  &times;
							</button>
						   
						</div>
						<div class="modal-body">
							确定删除该兴趣组？
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" 
							   data-dismiss="modal">取消
							</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">
							   确定
							</button>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-fade -->
					
				</div>
			</div>
		  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>