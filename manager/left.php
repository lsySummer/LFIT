﻿<!DOCTYPE html>
<html>
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

	
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mycss/mycss.css" rel="stylesheet">
    <script src="/scripts/jquery.min.js"></script>

	
   </head>
   <body>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12"  style="background-color:#f7f7f7">
			<ul class="nav nav-list">
			<li class="nav-header" style="font-weight:bold;text-align:right">
					 <span class="label" style="background-color:#999999;margin-top:40px">管理员</span>
				</li>
				<li class="nav-header" style="font-weight:bold">
					活动管理
				</li>
				<li  class="active">
					<a href="../manager/activityManage.php" target="frame4" style="color:#7fa731">修改活动 </a>
				</li>
				<li>
					<a href="../manager/allActivity.php" target="frame4" style="color:#7fa731">全部活动</a>
				</li>
				
				<li class="nav-header" style="font-weight:bold">
					兴趣组管理
				</li>
				<li>
					<a href="../manager/allInterest.php" target="frame4"  style="color:#7fa731">全部兴趣组</a>
				</li>
				<li>
					<a href="../manager/pushInterest.php" target="frame4"  style="color:#7fa731">推送</a>
				</li>
				<li class="divider">
				</li>
				
				<li class="nav-header" style="font-weight:bold">
					系统管理
				</li>
				<li>
					<a href="../manager/complain.php"  target="frame4" style="color:#7fa731">投诉处理</a>
				</li>
				<li>
					<a href="../manager/exerciseSta.php"  target="frame4" style="color:#7fa731">用户数量</a>
				</li>
				<li class="divider">
				</li>
				
			</ul>
		</div>
	</div>
</div>

	  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>