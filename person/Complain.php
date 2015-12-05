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

<script type='text/javascript'>
function check(){
	var info = document.getElementById("info").value;
	 if(info==''){
		window.alert('存在输入为空！');
		return false;
	}
	return true;
}
	function test(arr){
		var array = eval(arr);
	    var fatherForm = document.getElementById("selectUser");
	    for(var i=0;i<array.length;i++){
	    arrs = array[i].split(' ');
	    var varItem = new Option(array[i],i);   //objItemText, objItemValue   
	    fatherForm.options.add(varItem);     
		   }
		}
</script>

</head>

<body
	style="background-image: url('../image/bg.png'); background-size: cover;">
	<form class="form-horizontal" id="formAction"
		action="../filehandler/complain.php" method="post" enctype="multipart/form-data">
		<div style="width: 880px; height: 200px; border-left: 8px solid #abd241; border-top: 1px solid #abd241">
			<h3>投诉</h3>
			<div style="width: 700px; height: 40px; margin-top: 10px">
					<div
						style="margin: 5px 15px; width: 100px; text-align: right; float: left;">
						<span class="infoTxt">投诉对象</span><br />
					</div>
				<?php
				session_start ();
				$user_id = $_SESSION ['gluid'];
				$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
				$sql = "select udocid,ucoaid from userBasic where uid='$user_id'";
				$res = sqlite_unbuffered_query ( $db, $sql );
				$unamearr = array ();
				$i = 0;
				if ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
					$unamearr[0]="doctor ".$item["udocid"];
					$unamearr[1]="coach ".$item["ucoaid"];
				}
				?>
					<div
						style="margin: 5px 3px; float: left; text-align: left; float: left">
						<select class="selectpicker" style="height: 25px; margin-left: 1%"
							name="placeSelect" id="selectUser">
						</select>
						<script>
					test(<?php echo json_encode($unamearr)?>);
					</script>
				</div>
			</div>


			<div style="width: 700px; height: 125px; margin-top: 10px;">
				<div
					style="margin: 5px 15px; width: 100px; text-align: right; float: left">
					<span class="infoTxt">详细描述</span><br />
				</div>
				<div style="margin: 5px 3px; float: left;">

					<textarea cols="6" rows="10" style="width: 250px; height: 120px"
						name="info" id="info"></textarea>
					<br />
				</div>
			</div>
			<div style="width: 700px; height: 40px; margin-top: 26px;">
				<div
					style="margin: 5px 15px; width: 100px; text-align: right; float: left;">
					<span class="infoTxt">证明截图</span><br />
				</div>
				<div class="file-box" style="margin:5px 3px;float:left;"> 
					<input type='text' name='textfield' id='textfield' class='uploadtxt' readonly/> 
					<input type="file" name="file" class="uploadfile" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" /> 
					<input type="button" name="submit" class="uploadbtn" value="选择图片" >
				</div>
			</div>
			<div style="width: 500px; height: 40px; margin-top: 26px;">
				<button class="btn btn-block btn-success" type="submit"
					onclick="return check()">发送给管理员</button>
			</div>
		</div>
	</form>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>
