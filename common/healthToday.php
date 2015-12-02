<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <title>今日健康界面</title>
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

	function checkWeight(){
			var height = document.getElementById('height').value;
			height=height/100;
			var weight = document.getElementById('weight').value;
			var bmi = weight/((height)*(height));
			var goodWeight = height*height*22;
			document.getElementById('goodWeight').innerText=goodWeight.toFixed(1);
			document.getElementById('bmi').innerText=bmi.toFixed(1);
			if(weight>=goodWeight*0.9&&weight<=goodWeight*1.1){
			document.getElementById('idea').innerText="  您的体型基本正常，请继续保持！";
			}else if(weight<goodWeight*0.9){
				document.getElementById('idea').innerText="  您的体型偏瘦，请注重营养健康！";
			}else{
				document.getElementById('idea').innerText="  您的体型偏胖，请加强锻炼！";
				}
		}
		
</script>

<?php 
	session_start();
	$user_id = $_SESSION['gluid'];
?>

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
  

		<!-- 上传数据--> 
		<div style="background-color:#;height:100px;margin-bottom:20px;;">
		
			 <div style="height:100px;width:440px;float:left;border-top:1px solid #abd241;border-left:8px solid #abd241;background-color:#">
				
					<dt style="font-size:16px;margin-left:10px;margin-top:1%">
							最近健康状况<br/>
				<?php 
					if(file_exists("../xmldata/$user_id.xml")){
					$xml_array=simplexml_load_file("../xmldata/$user_id.xml");
					foreach($xml_array as $tmp){
						echo "心率" .$tmp->hr."<br>".  "血压" .$tmp->bp ."<br>";
						$goaldone = $tmp->goal;
						$dsleep = $tmp->dsleep;
						$ssleep = $tmp->ssleep;
						break;
					}
					}
				else{
					echo "<br>暂无数据";
				}
				?>
						</dt>
				
			 </div>
			
			<div style="background-color:#;margin-left:10px;height:100px;width:430px;float:left;border-top:1px solid #abd241;">
					<dl>
						<dt style="font-size:16px;margin-left:10px">
							最近建议
						</dt>
						<dd style="margin-top:2%;margin-left:1%">

							<?php
								$db = sqlite_open("../lfit.db",0666,$sqliteerror);
								$checksql = "select * from dfeedback where uid=$user_id order by udate desc limit 0,1";
								$res = sqlite_unbuffered_query($db,$checksql);
								if($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
								$did = $item["did"];
								$info = $item["info"];
								$sql = "select uname from userBasic where uid='$did'";
								$res = sqlite_unbuffered_query($db,$sql);
								if($item2 = sqlite_fetch_array($res, SQLITE_ASSOC)) {
									$dname = $item2["uname"];
									echo $info ."<br/>"."&nbsp from doctor " .$dname;
									}
								}else{
									echo "暂无医生的建议！";
								}
							?>
						</dd>
					</dl>
			</div>
		</div>
		<!--end-->
		<!-- 两个图表 -->	
	<div style=";height:250px;margin-top:20px;border-left:8px solid #abd241;background-color:">
  	<div style="width:300px;height:250px;margin-left:10px;float:left;">

		
	   <table id='myTable5'>
					<caption>每日运动目标：
					<?php
		$db = sqlite_open("../lfit.db",0666,$sqliteerror);
		$checksql = "select ugoal from userBasic where uid=$user_id";
		$res = sqlite_unbuffered_query($db,$checksql);
		if($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
			$ugoal = $item["ugoal"];
			echo $ugoal;
		}
		?>
		公里
					</caption>
			<thead>
				<tr>
					<th></th>
					<th>已完成</th>
					<th>未完成</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>
					<?php 
					echo $ugoal;
					?>
					</th>
					<td>
					<?php 
					echo $goaldone;
					if($goaldone>$ugoal){
						$goaldone = $ugoal;
					}
					?>
					</td>
					<td>
					<?php 
					echo ($ugoal-$goaldone);
					?>
					</td>
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
					<td>
					<?php 
					echo $ssleep;
					?>
					</td>
					<td>
					<?php 
					echo $dsleep;
					?>
					</td>
					</tr>
			</tbody>
		</table>  
	</div>	
	</div>
<!-- 两个图表结束 -->	
	

		<!--end-->
	
		<!--今日身高体重等-->
		<div style="background-color:white;border-left:8px solid #abd241;margin-top:20px;float:left;">
			<div style="float:left;width:110px;margin-top:20px;margin-left:17px;float:left;">
				<span style="color:#7fa731">身高 </span><input type="text" name="username" id="height" placeholder="cm" style="margin-top:20px;width:60px;border-radius: 10px;"/><br/>
				<span style="color:#7fa731">体重 </span><input type="text" name="username" id="weight" placeholder="kg"  style="margin-top:10px;width:60px;border-radius: 10px;"/><br/>	
				<button class="btn btn-success btn-sm" type="button" style="margin-top:10px;margin-left:40px" onclick="checkWeight()">确定</button>
			</div>
		
			<div style="width:180px;height:250px;float:left;;margin-top:0px">
				<img src="../image/person.png" style="height:240px;"></img>
			</div>
			<div style="height:270px;width:555px;float:left;">
				<img src="../image/per.png" style="margin-top:5px;"/>
				<br/>
				<h3>bmi指数:<span id="bmi"></span></h3>
				<div style="height:150px;background-color:#;margin-top:10px;border-radius:10px">
					<h3><span style="font-size:40px;color:#abd241">☆</span>您的理想体重<span style="font-size:40px" id="goodWeight"></span>
					公斤<br/><br/>
					<span id="idea"></span>
					</h3>
				</div>	
			</div>
		</div>
			
		<!-- 今日身高体重结束 -->
		<!--end -->

	<script src="../js/bootstrap.js"></script>
	</body>
</html>