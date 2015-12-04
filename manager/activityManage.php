<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<script  type="text/javascript">
function check(){
	var time=document.getElementById("time").value;
	var place = document.getElementById("place").value;
	var info = document.getElementById("info").value;
	 if(time==''||place==''||info==''){
		window.alert('存在输入为空！');
		return false;
	}
	return true;
}
function init(){
	document.getElementById("time").value='';
	document.getElementById("place").value='';
	document.getElementById("info").value='';
}
</script>

<link href="../css/mycss/mycss.css" rel="stylesheet">
<style>
#myModal {
	top: 10%;
}
</style>

</head>

<body
	style="background-image: url('../image/bg.png'); background-size: cover;">


	<div class="activity">
		<a href="#" onclick="init()"><img class="addPic" src="../image/add.png"
			data-toggle="modal" data-target="#myModal"></img></a>

	</div>
	<div class="activity">
		<img class="acImg" src="../image/activity2.jpg"></img>
		<p class="acP">
			时间：11月11日<br />地点：宿舍<br />双十一到了！快来买买买！
		</p>
		<button class="btn btn-primary btn-success btn-block"
			data-toggle="modal" data-target="#myModal">修改活动</button>
	</div>
	<div class="activity">
		<img class="acImg" src="../image/activity2.jpg"></img>
		<p class="acP">
			时间：11月11日<br />地点：宿舍<br />双十一到了！快来买买买！
		</p>
		<button class="btn btn-primary btn-success btn-block"
			data-toggle="modal" data-target="#myModal">修改活动</button>
	</div>

	<form class="form-horizontal" id="formAction"
		action="../phphandler/activity.php" method="post">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" style="height: 280px;">
						<div style="width: 700px; height: 40px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">时间</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="time" name="time" ></input>
							</div>
						</div>
						<div style="width: 700px; height: 40px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">地点</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="place" name="place" ></input>
							</div>
						</div>
						<div style="width: 700px; height: 120px; margin-top: 10px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">描述</span><br />
							</div>
							<div style="margin: 5px 3px; float: left; float: left;">

								<textarea cols="6" rows="10" id="info" name="info" style="width: 250px; height: 120px"></textarea>
								<br />
							</div>
						</div>

					</div>

					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消
						</button>
						<button type="submit" class="btn btn-primary" onclick="return check()">确定</button>
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