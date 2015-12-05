<!DOCTYPE html>
<html>

<head>

<title>个人管理界面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">


<link href="../css/mycss/mycss.css" rel="stylesheet">

  <script>

 function setValue(aid){
	var hid = document.getElementById('acId');
	hid.value=aid;
	 }
 </script>
</head>

<body
	style="background-image: url('../image/bg.png'); background-size: cover;">
			<?php
			error_reporting(E_ALL ^ E_NOTICE);
			session_start ();
			$user_id = $_SESSION ['gluid'];
			$user_name = $_SESSION ['gluname'];
			$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
			// 		uid int(11) not null,inid int(11) not null);");
			// 	sqlite_query($db,"drop table activity");
			$sql = "select uaid,acid from uactivity where uid='$user_id'";
			$res = sqlite_unbuffered_query ( $db, $sql );
			$isNullarr=true;
			while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
				$isNullarr=false;
				$acid = $item ["acid"];
				$uaid=$item["uaid"];
				$sql = "select * from activity where aid = '$acid'";
				$res1 = sqlite_unbuffered_query ( $db, $sql );
				if ( $item = sqlite_fetch_array ( $res1, SQLITE_ASSOC ) ) {
					$aid = $item ["aid"];
					$atime = $item ["atime"];
					$place = $item ["place"];
					$info = $item ["info"];
					echo '<div class="activity" >
			<img class="acImg" src="../image/activity2.jpg"></img>
			<p class="acP">
    		编号：' . $aid . '<br/>
    		时间：' . $atime . '<br/>地点：' . $place . '<br/>详情：' . $info . '</p>
			<button id=' . $aid . ' onclick="setValue(' . $uaid . ')" class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal">删除活动</button>
	</div>
		';}
			}
			if($isNullarr){echo '<span style="font-size:20px">暂无活动信息！</span>'; };
			?>
			<form class="form-horizontal" id="formAction"
		action="../phphandler/exitActi.php" method="post">
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
			<input type="hidden" value="" name="acId" id="acId">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">确定退出活动？</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消
					</button>
					<button type="submit" class="btn btn-primary" >
						确定</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-fade -->
	</form>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>