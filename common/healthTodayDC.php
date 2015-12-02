<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jsapi.js"></script>
	<script type="text/javascript" src="../js/corechart.js"></script>		
	<script type="text/javascript" src="../js/jquery.gvChart-1.0.1.min.js"></script>
	<script type="text/javascript" src="../js/jquery.ba-resize.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mycss/mycss.css" rel="stylesheet">

	<script type="text/javascript">
		gvChartInit();
		$(document).ready(function(){
			$('#myTable5').gvChart({
				chartType: 'PieChart',
				gvSettings: {
					vAxis: {title: 'No of players'},
					hAxis: {title: 'Month'},
					width: 400,
					height: 250,
				}
			});
		});
</script>

<script type="text/javascript">
gvChartInit();
$(document).ready(function(){
		$('#myTable1').gvChart({
			chartType: 'PieChart',
			gvSettings: {
			vAxis: {title: 'No of players'},
			hAxis: {title: 'Month'},
			width: 400,
			height: 250
		}
	});
});
</script>

   </head>
   <body style="background-image:url('../image/bg2.png');background-size:cover; ">
  

   <div class="span12"  style="background-color:;height:680px;width:880px">

		<!-- 上传数据--> 
		<div style="background-color:#;height:60px;margin-bottom:20px;;">
		
			 <div style="height:60px;width:880px;float:left;border-top:1px solid #abd241;border-left:8px solid #abd241;background-color:#;">
				<div style="float:left;margin-top:20px;">
						<dt style="font-size:16px;margin-left:100px">
							今日数据尚未上传！
						</dt>
				</div>
				<div style="height:40px;margin-top:10px;float:left">	
				<div class="file-box";style="float:left;"> 
					<form action="" method="post" enctype="multipart/form-data"> 
					<input type='text' name='textfield' id='textfield' class='uploadtxt' /> 
					<input type='button' class='uploadbtn' value='浏览...' /> 
					<input type="file" name="fileField" class="uploadfile" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" /> 
					<input type="submit" name="submit" class="uploadbtn" value="上传" /> 
					</form> 
				</div>
				</div> 
			 </div>
				
				
			 <!--
				<input type="file" name="myfile" style="margin-top:20px" class="btn btn-block">
			 -->
		</div>
		<!--end-->
		
			<!-- 色块
					<small >今日运动了2公里 <br/><cite>运动目标达成了70%<br/>累计运动了20公里</cite></small>
					
			<div class="todayHealth"  style="background-color:#abd241">
				<blockquote>
					<p>
						今日睡眠情况.
					</p> <small>今日睡眠时间8小时 <br/><cite> 累计5夜安眠</cite></small>
				</blockquote>
			</div>
			<div class="todayHealth"  style="background-color:#F0AD4E">
				<blockquote>
					<p>
						今日健康情况.
					</p> <small>今日心率 <br/>今日血压<cite></cite></small>
				</blockquote>
			</div>
			-->
		<div style=";height:250px;margin-top:20px;border-left:8px solid #abd241;background-color:">
			
		
					
					  
  	<div style="width:300px;height:250px;margin-left:10px;float:left;">

	   <table id='myTable5'>
					<caption>每日运动目标：8公里</caption>
			<thead>
				<tr>
					<th></th>
					<th>已完成</th>
					<th>未完成</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>8</th>
					<td>5</td>
					<td>3</td>
					</tr>
			</tbody>
		</table>  
		
	</div>	
	

	  	<div style="width:300px;height:250px;margin-left:100px;float:left;">

	   <table id='myTable1'>
					<caption>今日睡眠情况(小时)</caption>
			<thead>
				<tr>
					<th></th>
					<th>浅度</th>
					<th>深度</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>8</th>
					<td>6</td>
					<td>2</td>
					</tr>
			</tbody>
		</table>  
	</div>	
	
	
	</div>

		<!--end-->
	
		<!--今日身高体重等-->
		<div style="background-color:white;border-left:8px solid #abd241;margin-top:20px;float:left;">
			<div style="float:left;width:110px;margin-top:20px;margin-left:17px;float:left;">
				<span style="color:#7fa731">身高 </span><input type="text" name="username" value="" style="margin-top:20px;width:60px;border-radius: 10px;"/><br/>
				<span style="color:#7fa731">体重 </span><input type="text" name="username" value="" style="margin-top:10px;width:60px;border-radius: 10px;"/><br/>	
				<button class="btn btn-success btn-sm" type="button" style="margin-top:10px;margin-left:40px">确定</button>
			</div>
		
			<div style="width:180px;height:250px;float:left;;margin-top:0px">
				<img src="../image/person.png" style="height:240px;"></img>
			</div>
			<div style="height:270px;width:555px;text-align:center;float:left;">
				<img src="../image/per.png" style="margin-top:5px;"/>
				<img src="../image/arrow.jpg" style="margin-top:5px;width:50px"/>
				<div style="height:150px;background-color:#;margin-top:10px;border-radius:10px">
					<h3><span style="font-size:40px;color:#abd241">☆</span>你的理想体重<span style="font-size:40px">56.3</span>
					公斤，还需要摄入热量<span style="font-size:40px">108960</span>大卡，
					注意加强营养，合理搭配膳食！！</h3>
			</div>	
		</div>
		
		
		
		<!--end -->
		</div>

	

	<script src="../js/bootstrap.js"></script>
	</body>
</html>