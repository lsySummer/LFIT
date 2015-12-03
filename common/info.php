<!DOCTYPE html>
<html>
   <head>
      <title>个人管理界面</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
     <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <link href="../css/mycss/mycss.css" rel="stylesheet">
        <?php 
   session_start();
   $user_id = $_SESSION['gluid'];
   $db = sqlite_open("../lfit.db",0666,$sqliteerror);
   $checksql = "select * from userBasic where uid ='$user_id'";
   $res = sqlite_unbuffered_query($db,$checksql);
   if($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
   	$imgurl = $item["uimg"];
   	$user_name=$item["uname"];
   	$ugoal = $item["ugoal"];
   	$birth = $item["ubirth"];
   	$place = $item["uplace"];
   	$word = $item["uword"];
   	echo "<script> var word = \"$word\";</script>";
   	echo "<script> var place = \"$place\";</script>";
   	echo "<script> var birth = \"$birth\";</script>";
   }
   ?>


	<script language="javascript">
	function test1(event){
		if(event.keyCode<48 || event.keyCode>57){
			window.alert("Not Number");
			/*window.event.returnValue=false;*/
			return false;
		}
	}

	function setPotrait(){
		var docObj=document.getElementById("doc");
		 
		var imgObjPreview=document.getElementById("preview");
		if(docObj.files &&docObj.files[0])
		{
		//火狐下，直接设img属性
		imgObjPreview.style.display = 'block';
		imgObjPreview.style.width = '200px';
		imgObjPreview.style.height = '200px';
		//imgObjPreview.src = docObj.files[0].getAsDataURL();
		 
		//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
		imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		}
		else
		{
		//IE下，使用滤镜
		docObj.select();
		var imgSrc = document.selection.createRange().text;
		var localImagId = document.getElementById("localImag");
		//必须设置初始大小
		localImagId.style.width = "200px";
		localImagId.style.height = "200px";
		//图片异常的捕捉，防止用户修改后缀来伪造图片
		try{
		localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
		localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
		}
		catch(e)
		{
		alert("您上传的图片格式不正确，请重新选择!");
		return false;
		}
		imgObjPreview.style.display = 'none';
		document.selection.empty();
		}
		return true;
	}
	
	function save(){
		return true;
	}
	</script>
 
	
   </head>

   <body style="background-image:url('../image/bg.png');background-size:cover; ">
 
	<div style="border-top:1px solid #abd241;width:350px;height:500px;float:left;margin-left:50px;">
	<div style="background-color:#abd241; height:400px; width:10px;float:left;" ></div>
	<div style="padding-left:25%;padding-top:5%">
		<img src=<?php echo $imgurl?> style="width:200px;height:200px;" id="preview"></img><br/>
	</div>
 <form action="../filehandler/headData.php" method="post" enctype="multipart/form-data">
    <div style="float:left;margin-left:30%">
      <a href="" class="a-upload" >修改头像
    <input type="file" name="file" id="doc" onchange="return setPotrait();">
    </a>
    </div>
    <div style="float:left;margin-left:5%">
    <input type="submit" class="a-upload" onclick="">
    </div>
	</form>
	<br/>
	<div style="margin-top:10%;">
	 <span class="label" style="background-color:#999999;margin-left:20%">健康管理<span>100</span>天</span>
	 <span class="label" style="background-color:#999999;margin-top:10%;">累计运动量全国排名<span>50</span>位</span>
	</div>

	</div>
   <div style="border-top:1px solid #abd241;;width:850px;height:500px;float:left;margin-left:40px">
		<div style="background-color:#abd241; height:500px; width:10px;float:left;" >
		</div>
		<form action="../phphandler/modifyInfo.php" method="post">
		<h3 style="margin-left:30px">个人资料修改</h3>
		<!--2-->
		<div style="width:700px;height:40px;">
			<div style="margin:5px 15px;text-align:right;width:100px;;float:left">
				<span class="infoTxt">性别</span><br/>
			</div>
			<div style="margin:5px 3px;float:left;text-align:left;float:left">
				<label class="checkbox-inline">
				  <input type="radio" name="sexOption" id="optionsRadios3" 
					 value="0" checked> 男
			    </label>
			    <label class="checkbox-inline">
				  <input type="radio" name="sexOption" id="optionsRadios4" 
					 value="1"> 女
			    </label>
			</div>
		</div>
		
		<!--6-->
		<div style="width:700px;height:40px;">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left;">
				<span class="infoTxt">生日</span><br/>
			</div>
			<div style="text-align:left;float:left;height:40px;">
				
			 <div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy MM dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd"
				style="width:240px;">
                    <input class="form-control" size="16" type="text" name="datePicker" id="birthdate" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
			
			</div>
		</div>
		<!--3-->
		<div style="width:700px;height:40px;margin-top:10px">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left;">
				<span class="infoTxt">所在地</span><br/>
			</div>
			<div style="margin:5px 3px;float:left;text-align:left;float:left">
				<select class="selectpicker" style="height:25px" name="placeSelect" id="selectPlace">
				<option value="北京">北京</option>
				<option value="江苏">江苏</option>
				<option value="浙江">浙江</option>
				<option value="湖北">湖北</option>
				<option value="辽宁">辽宁</option>
				<option value="山东">山东</option>
				<option value="四川">四川</option>
				<option value="福建">福建</option>
				<option value="湖南">湖南</option>
				<option value="陕西">陕西</option>
				<option value="江西">江西</option>
				<option value="安徽">安徽</option>
				<option value="河北">河北</option>
				<option value="黑龙江">黑龙江</option>
				<option value="广西">广西</option>
				<option value="吉林">吉林</option>
				<option value="山西">山西</option>
				<option value="云南">云南</option>
				<option value="甘肃">甘肃</option>
				<option value="贵州">贵州</option>
				<option value="新疆">新疆</option>
				<option value="海南">海南</option>
				<option value="内蒙古">内蒙古</option>
				<option value="宁夏">宁夏</option>
				<option value="青海">青海</option>
				<option value="西藏">西藏</option>
				<option value="河南">河南</option>
				<option value="广东" >广东</option>
				<option value="上海">上海</option>
				<option value="天津">天津</option>
				<option value="重庆">重庆</option>
				<option value="香港">香港</option>
				<option value="澳门">澳门</option>
				<option value="台湾">台湾</option>
				<option value="国外">国外</option>
				
			  </select>
			</div>
		</div>
		<!--5-->
		<div style="width:700px;height:40px">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left">
				<span class="infoTxt">运动目标</span><br/>
			</div>
			<div style="margin:5px 3px;float:left;text-align:left;float:left">
				<input type="text" name="goal" id="sportGoal" value=<?php echo $ugoal?> onkeypress="return test1(event)"></input>
			</div>
		</div>
		<!--5-->
		<div style="width:700px;height:120px;margin-top:10px">
			<div style="margin:5px 15px;width:100px;text-align:right;float:left">
				<span class="infoTxt">运动宣言</span><br/>
			</div>
			<div style="margin:5px 3px;float:left;">
				<textarea  name="word" cols="6" rows="10" style="width:250px;height:120px"><?php echo $word?>
				</textarea><br/>
			</div>
		</div>
		<div  style="width:700px;height:40px;margin-top:20px;margin-left:140px">
		 <input class="btn btn-success" type="submit" style="width:255px" onclick="return save()"/>
		</div>
		</form>
	</div>
	
	
			<script type="text/javascript" src="../jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
			<script type="text/javascript" src="../js/bootstrap.min.js"></script>
			<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
			<script type="text/javascript">


	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });	

</script>
<script type="text/javascript">
document.getElementById('selectPlace').value=place;
document.getElementById('birthdate').value=birth;
</script>
       
	</body>
</html>