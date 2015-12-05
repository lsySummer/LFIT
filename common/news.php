
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">


<link href="../css/mycss/mycss.css" rel="stylesheet">


</head>
<body
	style="background-image: url('../image/bg.png'); background-size: cover;">
	<div style="width: 880px">
		<div id="myAlert" class="alert alert-warning"">
			<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>提示！</strong>您有新的未读消息！
		</div>
						<?php
						session_start ();
						$user_id = $_SESSION ['gluid'];
						$user_name = $_SESSION ['gluname'];
						$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
						$sql = "select * from unews where uid='$user_id'";
						$res = sqlite_unbuffered_query ( $db, $sql );
						// sqlite_query($db,"create table unews(unid integer primary key,uid int(11),
						// 		udate date not null,info text not null
						// 		);");
						while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
							$info = $item ["info"];
							echo '<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
						<p style="margin-top:10px;font-size:15px">
							'.$info.'
						</p>
						 <span class="label" style="background-color:#999999;margin-top:40px;margin-left:680px">来自管理员</span>
					</div>
		';
						}
						?>
						
					
				</div>

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