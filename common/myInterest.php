<!DOCTYPE html>
<html>

<head>

  <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	
    <link href="../css/mycss/mycss.css" rel="stylesheet">

	
	</head>

<body  style="background-image:url('../image/bg.png');background-size:cover; ">
	
	<div class="tabbable" id="tabs-592203">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-374785" data-toggle="tab">今日推送</a>
					</li>
					<li>
						<a href="#panel-286187" data-toggle="tab">我的兴趣组</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-374785">
					<!--缩略图-->
				<div style="width:990px;height:600px;">
				
					<div class="interest" >
						<div class="thumbnail">
							<img alt="300x200" src="../image/interest1.jpg" style="width:300px;height:150px;"/>
							<div class="caption">
								<h3>
									基德兴趣组
								</h3>
								<p>
									Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.
								</p>
								
							</div>
						</div>
					</div>
					
					<div class="interest" >
						<div class="thumbnail">
							<img alt="300x200" src="../image/interest2.jpg" style="width:300px;height:150px;" />
							<div class="caption">
								<h3>
									萌猫兴趣组
								</h3>
								<p>
									Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.
								</p>
							
							</div>
						</div>
					</div>
					
					<div class="interest" >
						<div class="thumbnail">
						<img alt="300x200" src="../image/interest3.jpg" style="width:300px;height:150px;" />
						<div class="caption">
							<h3>
								动来动去兴趣组
							</h3>
							<p>
								Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.
							</p>
							
						</div>
					</div>
					</div>
				
			    </div>
			<!-- 缩略图end-->

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
						<div class="modal-body">
							确定退出兴趣组？
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
					
					<div class="tab-pane" id="panel-286187">
						<div class="activity">
							<img class="acImg" src="../image/activity1.jpg"></img>
							<p class="acP">时间：11月1日<br/>地点：鼓楼校区<br/>交完web作业，大家一起来跑步吧！</p>
							<button class="btn btn-success btn-block">我要退出</button>
						</div>
						<div class="activity">
							<img class="acImg" src="../image/activity1.jpg"></img>
							<p class="acP">时间：11月1日<br/>地点：鼓楼校区<br/>交完web作业，大家一起来跑步吧！</p>
							<button class="btn btn-success btn-block">我要退出</button>
						</div>
					</div>
				
				
				</div>
			</div>
		  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>