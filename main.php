<!DOCTYPE html>
<html>
<head>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0,user-scalable=0;">

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="css/mycss/mycss.css" rel="stylesheet">

<style>
#myModal2 {
	top: 10%;
}
</style>

<script src="jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript">

function check(){
		var nickname=document.getElementById("rename").value;
		var pass1 = document.getElementById("password1").value;
		var pass2 = document.getElementById("password2").value;
		var goal=document.getElementById("regoal").value;
		if(pass1!=pass2){
			window.alert('密码不相同！');
			return false;
		}else if(nickname==''||goal==''){
			window.alert('存在输入为空！');
			return false;
			}else if(isNaN(goal)){
				window.alert('运动目标请输入数字！');
				return false;
			}
		return true;
	}

function login(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	if(username==''||password==''){
			window.alert('存在输入为空！');
			return false;
		}
	return true;
}
	
	
	function $(id) {
		window.alert("hello");
		return document.getElementById(id).value;
	}
</script>
</head>

<body
	style="background-image: url('image/main3.jpg'); background-size: cover; background-repeat: no-repeat; width: 100%; height: 100%; background-attachment: fixed;">


	<div id="d1">
		<div class="row-fluid">
			<div class="span4" style="margin-top: 10%">
				<h3 style="margin-left: 3%">
					<font face="微软雅黑"> 欢迎来到L-FIT！<br /> <br /> 马上开启运动健康之旅！
					</font>
				</h3>
			</div>
			<div class="span8" style="margin-top: 5%; margin-left: 2%">
				<form class="form-horizontal" id="formAction"
					action="phphandler/loginSql.php" method="post">

					<div class="control-group">
						<label class="control-label" for="username">用户名</label>
						<div class="controls">
							<input id="username" type="text" name="username" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">密码</label>
						<div class="controls">
							<input id="password" type="password" name="password" />
						</div>
					</div>

					<div class="control-group" style="margin-top: 3%">
						<div class="controls">
							<button type="submit" class="btn" name="submit" value="login" onclick="return login()">登陆</button>
							<button type="reset" class="btn" style="margin-left: 5%">重置</button>
						</div>
					</div>

				</form>
				<h4 class="btn" data-toggle="modal" data-target="#myModal2"
					style="border: 1px solid #d4c5b0">没有账号？马上注册！</h4>
			</div>
		</div>
	</div>

	<script async>
	d1=document.getElementById("d1");
	w=d1.offsetWidth;
	h=w*0.5;
	d1.style.height=h+"px";
</script>

	<form class="form-horizontal" id="formAction"
		action="phphandler/registerSql.php" method="post">
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>

					</div>
					<div class="modal-body">注册</div>
					<!--divStart-->
					<div
						style="width: 540px; height: 220px; float: left; margin-left: 10px; margin-top: 10px">
						<!-- 1 -->
						<div style="width: 700px; height: 40px;">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">昵称</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="rename" name="uname"></input>
							</div>
						</div>
						<!--2-->
						<div style="width: 700px; height: 40px;">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">密码</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="password" id="password1" name="upass"></input>
							</div>
						</div>
						<!--2-->
						<div style="width: 700px; height: 40px;">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">确认密码</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="password" id="password2"></input>
							</div>
						</div>
						<!--2-->


						<div style="width: 700px; height: 40px;">
							<div
								style="margin: 5px 15px; text-align: right; width: 100px;; float: left">
								<span class="infoTxt">身份</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<label class="checkbox-inline"> <input type="radio"
									name="uidentity" id="optionsRadios3" value="1"
									checked> 个人用户
								</label> <label class="checkbox-inline"> <input type="radio"
									name="uidentity" id="optionsRadios4" value="2">
									医生
								</label> <label class="checkbox-inline"> <input type="radio"
									name="uidentity" id="optionsRadios5" value="3">
									教练
								</label>
							</div>
						</div>

						<div style="width: 700px; height: 40px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">每日运动目标</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="regoal" placeholder="公里" name="ugoal"></input>
							</div>
						</div>


					</div>

					<!--divend-->

					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消
						</button>
						<button type="submit" class="btn btn-primary"
							onclick="return check()">确定</button>
					</div>
				</div>
			</div>
		</div>
	</form>


	<!--login-->

	<!--login-->


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.js"></script>


</body>

</html>
