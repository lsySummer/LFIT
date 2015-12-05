<!DOCTYPE html>
<html>

<head>

  <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">


    <link href="../css/mycss/mycss.css" rel="stylesheet">

	
	<script language="javascript" type="text/javascript">
	function openJoin(e){
		window.confirm(e);
	}

	 function setValue(aid){
			var hid = document.getElementById('acId');
			hid.value=aid;
	 }
	</script>
</head>

<body  style="background-image:url('../image/bg.png');background-size:cover; ">

		<!--slide-->
<div class="carousel slide" id="carousel-79055" style="width:880px">
			<ol class="carousel-indicators">
				<li data-slide-to="0" data-target="#carousel-79055" style="margin-bottom:-30px">
				</li>
				<li data-slide-to="1" data-target="#carousel-79055" class="active" style="margin-bottom:-30px">
				</li>
				<li data-slide-to="2" data-target="#carousel-79055" style="margin-bottom:-30px">
				</li>
			</ol>
			<div class="carousel-inner">
				<div class="item">
					<a href="#"><img alt="" src="../image/1.jpg" onclick="openJoin('确定要加入该活动？')" /></a>
					<div class="carousel-caption" style="background-color:black;opacity: 0.6;width:880px;height:140px;margin-left:-175px;margin-bottom:-18px">
						<h4>
							棒球
						</h4>
						<p>
							棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。
						</p>
					</div>
				</div>
				<div class="item active">
					<a href="#"><img alt="" src="../image/2.jpg" onclick="openJoin('确定要加入该活动？')"/></a>
					<div class="carousel-caption"  style="background-color:black;opacity: 0.6;width:880px;height:140px;margin-left:-175px;margin-bottom:-18px">
						<h4>
							冲浪
						</h4>
						<p>
							冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。
						</p>
					</div>
				</div>
				<div class="item">
					<a href="#"><img alt="" src="../image/3.jpg" onclick="openJoin('确定要加入该活动？')"/></a>
					<div class="carousel-caption" style="background-color:black;opacity: 0.6;width:880px;height:140px;margin-left:-175px;margin-bottom:-18px"> 
						<h4>
							自行车
						</h4>
						<p>
							以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。
						</p>
					</div>
				</div>
			</div> 
				
				<!--
				<a data-slide="prev" href="#carousel-79055" class="left carousel-control">?</a> 
				<a data-slide="next" href="#carousel-79055" class="right carousel-control">?</a>
				-->
				
			<a class="left carousel-control" href="#carousel-79055" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">上一页</span>
			</a>
			<a class="right carousel-control" href="#carousel-79055" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">下一页</span>
			</a>
		</div>
		<!--slide end-->
		
		<div style="width:880px;background-color:white">
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
			<button id='.$aid.' onclick="setValue('.$aid.')" class="btn btn-primary btn-success btn-block" data-toggle="modal" 
		data-target="#myModal">我要加入</button>
	</div>
		';
	}
	?>
						
			<form class="form-horizontal" id="formAction"
		action="../phphandler/joinAct.php" method="post">
			<!-- 模态框（Modal） -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
			   aria-labelledby="myModalLabel" aria-hidden="true">
			   <input type="hidden" value="" name="acId" id="acId">
			   <div class="modal-dialog">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" 
							   data-dismiss="modal" aria-hidden="true">
								  &times;
							</button>
						   
						</div>
						<div class="modal-body">
							确定加入活动？
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
		</div>
		
	

	  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>