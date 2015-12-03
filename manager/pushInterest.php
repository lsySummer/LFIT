<!DOCTYPE html>
<html>

<head>

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
	
	</head>

<body  style="background-image:url('../image/bg.png');background-size:cover; ">
	<div style="width:880px;height:200px;border-left:8px solid #abd241;border-top:1px solid #abd241">
	<h3>推送消息</h3>
	
	
		
	<div style="width:700px;height:40px;margin-top:10px">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left;">
				<span class="infoTxt">推送至</span><br/>
			</div>
			<div style="margin:5px 3px;float:left;text-align:left;float:left">
				
				   <label class="checkbox-inline">
					  <input type="checkbox" id="inlineCheckbox1" value="option1"> 篮球
				   </label>
				   <label class="checkbox-inline">
					  <input type="checkbox" id="inlineCheckbox2" value="option2"> 足球
				   </label>
				   <label class="checkbox-inline">
					  <input type="checkbox" id="inlineCheckbox3" value="option3"> 乒乓球
				   </label>
				    <label class="checkbox-inline">
					  <input type="checkbox" id="inlineCheckbox3" value="option3"> 代码
				   </label>
			</div>
		</div>
			
			<div style="width:700px;height:125px;margin-top:10px;">
				<div style="margin:5px 15px;width:100px;text-align:right;float:left">
					<span class="infoTxt">详细描述</span><br/>
				</div>
				<div style="margin:5px 3px;float:left;">
					
				<textarea cols="6" rows="10" style="width:250px;height:120px"></textarea><br/>
			</div>
		</div>
		
			<div style="width:700px;height:40px;margin-top:26px;">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left;">
				<span class="infoTxt">配图</span><br/>
			</div>
			<div class="file-box" style="margin:5px 3px;float:left;"> 
					<form action="" method="post" enctype="multipart/form-data"> 
					<input type='text' name='textfield' id='textfield' class='uploadtxt' /> 
					
					<input type="file" name="fileField" class="uploadfile" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" /> 
					<input type="submit" name="submit" class="uploadbtn" value="上传" /> 
					</form> 
				</div> 
		</div>
		<div style="width:500px;height:40px;margin-top:26px;">
		 <button class="btn btn-block btn-success" type="button">确认发布</button>
		</div>
	</div>
		  
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>

</body>

</html>
</html>