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
 <?php
	session_start ();
	$user_id = $_SESSION ['gluid'];
	$user_name = $_SESSION ['gluname'];
	$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
	?>
	</head>

<body
	style="background-image: url('../image/bg.png'); background-size: cover;">

	<div class="tabbable" id="tabs-592203">
		<ul class="nav nav-tabs">
			<li><a href="#panel-374785" data-toggle="tab">今日推送</a></li>
			<li class="active"><a href="#panel-286187" data-toggle="tab">我的兴趣组</a>
			</li>
		</ul>

		<form class="form-horizontal" id="formAction"
			action="../phphandler/exitInterest.php" method="post">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
				aria-labelledby="myModalLabel" aria-hidden="true">
				<input type="hidden" value="" name="acId" id="acId">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>

						</div>
						<div class="modal-body">确定退出兴趣组？</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">取消</button>
							<button type="submit" class="btn btn-primary">确定</button>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-fade -->
		</form>
		<div class="tab-content">
		<div class="tab-pane  active" id="panel-286187">
			<?php
			$sql = "select * from uinterest where uid='$user_id'";
			$res = sqlite_unbuffered_query ( $db, $sql );
			$inidarr = array();
			$k=0;
			$isNull=true;
			while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
				$isNull=false;
				$acid = $item ["inid"];
				$uaid = $item ["uiid"];
				$inidarr[$k]=$acid;
				$k++;
				$sql = "select * from interest where iid = '$acid'";
				$res1 = sqlite_unbuffered_query ( $db, $sql );
				if ($item = sqlite_fetch_array ( $res1, SQLITE_ASSOC )) {
					$aid = $item ["iid"];
					$atime = $item ["inum"];
					$place = $item ["place"];
					$info = $item ["info"];
					echo '<div class="activity" >
			<img class="acImg" src="../image/activity2.jpg"></img>
			<p class="acP">
    		编号：' . $aid . '<br/>
    		人数：' . $atime . '<br/>名称：' . $place . '<br/>详情：' . $info . '</p>
			<button id=' . $aid . ' onclick="setValue(' . $uaid . ')" class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal">退出兴趣组</button>
	</div>
		';
				}
			}
			if($isNull){echo '<span style="font-size:20px">您尚未加入兴趣组！</span>'; };
			?>
		</div>

			<div class="tab-pane" id="panel-374785">
				<!--缩略图-->
			<?php
			if(count($inidarr)==0){
				echo '<span style="font-size:20px">暂无推送信息！</span>'; ;
			}
			else{
			$isNull=true;
			foreach($inidarr as $inid){
			$todayData=date("Y-m-d");
			$sql = "select * from upush where iid='$inid' and udate='$todayData'";
			$res = sqlite_unbuffered_query ( $db, $sql );
			while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
				$isNull=false;
				$iid=$item["iid"];
				$info=$item["info"];
				$url=$item["img"];
				$sql = "select place from interest where iid='$iid'";
				$res1 = sqlite_unbuffered_query ( $db, $sql );
				if ( $item1 = sqlite_fetch_array ( $res1, SQLITE_ASSOC ) ) {
					$name=$item1["place"];
				}
				echo '
					<div class="interest" style="border:3px solid #f7f7f7;height:400px">
						<div class="thumbnail" style="border:0px solid red;">
							<img alt="300x200" src='.$url.'
								style="width: 300px; height: 150px;" />
							<div class="caption">
								<h3>
								'.$name.'
								兴趣组
								</h3>
								<p>
									'.$info.';
								</p>

							</div>
						</div>
					</div>
			';
			}
			if($isNull){echo '<span style="font-size:20px">您尚未加入兴趣组！</span>'; };
			};
			}
		?>
			<!-- 缩略图end-->
</div>
		</div>

	</div>
	</div>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>