<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<form class="form-horizontal" id="formAction"
		action="phphandler/sqlhandler.php" method="post">
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
		<span id="logSpan"> </span>

		<div class="control-group" style="margin-top: 5%">
			<div class="controls">
				<button type="submit" class="btn" name="submit" value="login">登陆</button>
				<button type="reset" class="btn" style="margin-left: 5%">重置</button>
			</div>
		</div>

	</form>
</body>