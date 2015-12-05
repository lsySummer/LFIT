<!DOCTYPE html>
<html>

<head>

  <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	
	
    <link href="../css/mycss/mycss.css" rel="stylesheet">
 <style>
    #myModal
    {
        top:10%;
    }
	</style>
	<script>
	 function setValue(aid){
			var hid = document.getElementById('acId');
			hid.value=aid;
			 }
	function test1(event){
		if(event.keyCode<48 || event.keyCode>57){
			window.alert("Not Number");
			return false;
		}
	}

	function check(){
		var perNum=document.getElementById("perNum").value;
		var place = document.getElementById("place").value;
		var info = document.getElementById("info").value;
		 if(perNum==''||place==''||info==''){
			window.alert('存在输入为空！');
			return false;
		}
		return true;
	}
	</script>
	</head>

<body  style="background-image:url('../image/bg.png');background-size:cover; ">
	

						<div class="activity">
							<a href="#"><img class="addPic" src="../image/add.png" data-toggle="modal"  data-target="#myModal"></img></a>
						</div>
						<?php 
	$db = sqlite_open("../lfit.db",0666,$sqliteerror);
	$sql = "select * from interest";
	$res = sqlite_unbuffered_query($db,$sql);
	$arr = array();
	$i=0;
	while($item = sqlite_fetch_array($res, SQLITE_ASSOC)){
		$aid = $item["iid"];
		$arr[$i] = $aid;
		$i++;
		$atime = $item["inum"];
		$place = $item["place"];
		$info = $item["info"];
		echo '<div class="activity" >
			<img class="acImg" src="../image/activity2.jpg"></img>
			<p class="acP">
    		编号：'.$aid.'<br/>
    		人数：'.$atime.'<br/>名称：'.$place.'<br/>详情：'.$info.'</p>
			<button id='.$aid.' onclick="setValue('.$aid.');" class="btn btn-primary btn-success btn-block" data-toggle="modal"  data-target="#myModal2">删除兴趣组</button>
	</div>
		';
	}
	?>
		<form class="form-horizontal" id="formAction"
		action="../phphandler/createInterest.php" method="post">
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal" aria-hidden="true">
								  &times;
							</button>
						   
						</div>
						<div class="modal-body" style="height:280px;">
						<div style="width:700px;height:40px">
							<div style="margin:5px 15px;width:100px;text-align:right;float:left">
								<span class="infoTxt">人数</span><br/>
							</div>
							<div style="margin:5px 3px;float:left;text-align:left;float:left">
								<input type="text" id="perNum" name="perNum" onkeypress="return test1(event)"></input>
							</div>
						</div>
							<div style="width:700px;height:40px">
								<div style="margin:5px 15px;width:100px;text-align:right;float:left">
									<span class="infoTxt">名称</span><br/>
								</div>
								<div style="margin:5px 3px;float:left;text-align:left;float:left">
									<input type="text" id="place" name="place" ></input>
								</div>
							</div>
						<div style="width:700px;height:120px;margin-top:10px">
							<div style="margin:5px 15px;width:100px;text-align:right;float:left">
								<span class="infoTxt">描述</span><br/>
							</div>
							<div style="margin:5px 3px;float:left;float:left;">
								
								<textarea cols="6" rows="10" style="width:250px;height:120px"
								id="info" name="info"></textarea><br/>
							</div>
						</div>
						
						</div>
					
						<div class="modal-footer" style="text-align:center">
							<button type="button" class="btn btn-default" 
							   data-dismiss="modal">取消
							</button>
							<button type="submit" class="btn btn-primary" onclick="return check()">
							   确定
							</button>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-fade -->
			</form>
			
			<form class="form-horizontal" id="formAction2"
		action="../phphandler/delInterest.php" method="post">
		<input type="hidden" value="" name="acId" id="acId">
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" 
			   aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal" aria-hidden="true">
								  &times;
							</button>
						   
						</div>
						<div class="modal-body">
							确定删除该兴趣组？
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" 
							   data-dismiss="modal">取消
							</button>
							<button type="submit" class="btn btn-primary" >
							   确定
							</button>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-fade -->
			</form>		
		  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>