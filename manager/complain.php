
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">


<link href="../css/mycss/mycss.css" rel="stylesheet">


<style>
#myModal {
	top: 10%;
}
</style>
<script>
function setValue(aid){
	var hid = document.getElementById('acId');
	hid.value=aid;
}
</script>
</head>
<body
	style="background-image: url('../image/bg.png'); background-size: cover;">



	<div id="myAlert" class="alert alert-warning" style="width: 880px">
		<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>提示！</strong>有新的投诉！
	</div>
						
							<?php
							$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
							$sql = "select * from complain";
							$res = sqlite_unbuffered_query ( $db, $sql );
							while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
								// sqlite_query($db,"create table complain(cid integer primary key,
								// 		uid int(11) not null,toid int(11) not null,info text not null,
								// 		img text
								// 		);");
								$cid = $item ["cid"];
								$info = $item["info"];
								$scr = $item["img"];
								$uid=$item["uid"];
								$toid=$item["toid"];
								$sql="select uname from userBasic where uid='$uid'";
								$res3 = sqlite_unbuffered_query ( $db, $sql );
								if ( $item = sqlite_fetch_array ( $res3, SQLITE_ASSOC ) ) {
									$uname=$item["uname"];
								}
								$sql="select uname from userBasic where uid='$toid'";
								$res2 = sqlite_unbuffered_query ( $db, $sql );
								if ( $item = sqlite_fetch_array ( $res2, SQLITE_ASSOC ) ) {
									$toname=$item["uname"];
								}
								echo '<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
						<h4>投诉对象:'.$toname.'</h4>
						<p style="margin-top:10px;font-size:15px">
							'.$info.'
						</p>
						<img src='.$scr.' style="height:60px;width:150px"/>
						 <span class="label" style="background-color:#999999;margin-top:40px;margin-left:700px">2015.12.6</span>
						 <span class="label" style="background-color:#999999;">'.$uname.'</span><br/>
						<button id='.$cid.' onclick="setValue('.$cid.');" class="btn btn-primary btn-success" 
										style="width:150px;margin-left:20px" data-toggle="modal"  data-target="#myModal">处理</button>
							</div>
		';
							}
							?>
						
						
					
					
					<form class="form-horizontal" id="formAction"
		action="../phphandler/mcomplain.php" method="post"
		enctype="multipart/form-data">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<input type="hidden" value="" name="acId" id="acId">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>

					</div>
					<div class="modal-body" style="height: 280px;">
						<div
							style="width: 700px; height: 100px; margin-top: 10px; float: left">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">反馈投诉者</span><br />
							</div>
							<div style="margin: 5px 3px; float: left; float: left;">
								<textarea cols="6" rows="10" style="width: 250px; height: 100px"
									name="touser"></textarea>
								<br />
							</div>
						</div>
						<div
							style="width: 700px; height: 100px; margin-top: 10px; float: left">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">反馈被投诉者</span><br />
							</div>
							<div style="margin: 5px 3px; float: left; float: left;">
								<textarea cols="6" rows="10" style="width: 250px; height: 100px"
									name="todc"></textarea>
								<br />
							</div>
						</div>

					</div>

					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消
						</button>
						<button type="submit" class="btn btn-primary">确定</button>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-fade -->
	</form>

	<script type="text/javascript">
				$(function(){
				   $(".close").click(function(){
					  $("#myAlert").alert('close');
				   });
				});  

				</script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>