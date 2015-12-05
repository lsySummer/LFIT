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
function check1(){
	var time=document.getElementById("time1").value;
	var place = document.getElementById("place1").value;
	var info = document.getElementById("info1").value;
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
  <script>
 function setValue(aid){
	var hid = document.getElementById('acId');
	hid.value=aid;
	try
	  {// Firefox, Opera 8.0+, Safari, IE7
	  xmlHttp=new XMLHttpRequest();
	  }
	catch(e)
	  {// Old IE
	  try
	    {
	    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	  catch(e)
	    {
	    alert ("Your browser does not support XMLHTTP!");
	    return;  
	    }
	  }
	var url="ajaxShow.php?aid=" + aid;
	url=url+"&sid="+Math.random();
	xmlHttp.open("GET",url,false);
	xmlHttp.send(null);
	var str = xmlHttp.responseText;
	 var arr=str.split(";");
	document.getElementById("time1").value=arr[0];
	document.getElementById("place1").value=arr[1];
	document.getElementById("info1").value=arr[2];
	 }
 </script>
</head>

<body
	style="background-image: url('../image/bg.png'); background-size: cover;">


	<div class="activity">
		<a href="#" onclick="init()"><img class="addPic" src="../image/add.png"
			data-toggle="modal" data-target="#myModal"></img></a>

	</div>
	
	<?php 
	$db = sqlite_open("../lfit.db",0666,$sqliteerror);
	$sql = "select * from activity";
	$res = sqlite_unbuffered_query($db,$sql);
	$arr = array();
	$i=0;
	while($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
		$aid = $item["aid"];
		$arr[$i] = $aid;
		$i++;
		$atime = $item["atime"];
		$place = $item["place"];
		$info = $item["info"];
		echo '<div class="activity" >
			<img class="acImg" src="../image/activity2.jpg"></img>
			<p class="acP">
    		编号：'.$aid.'<br/>
    		时间：'.$atime.'<br/>地点：'.$place.'<br/>详情：'.$info.'</p>
			<button id='.$aid.' onclick="setValue('.$aid.');" class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal2">修改活动</button>
	</div>
		';
	}
	?>

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
	
	<form class="form-horizontal" id="formAction"
		action="../phphandler/modiAc.php" method="post">
		<input type="hidden" value="" name="acId" id="acId">
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" style="height: 260px;">
						<div style="width: 700px; height: 40px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">时间</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="time1" name="time1"></input>
							</div>
						</div>
						<div style="width: 700px; height: 40px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">地点</span><br />
							</div>
							<div
								style="margin: 5px 3px; float: left; text-align: left; float: left">
								<input type="text" id="place1" name="place1" ></input>
							</div>
						</div>
						<div style="width: 700px; height: 120px; margin-top: 10px">
							<div
								style="margin: 5px 15px; width: 100px; text-align: right; float: left">
								<span class="infoTxt">描述</span><br />
							</div>
							<div style="margin: 5px 3px; float: left; float: left;">

								<textarea cols="6" rows="10" id="info1" name="info1" style="width: 250px; height: 120px"></textarea>
								<br />
							</div>
						</div>

					</div>

					<div class="modal-footer" style="text-align: center">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消
						</button>
						<button type="submit" class="btn btn-primary" onclick="return check1()">确定</button>
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