
<!DOCTYPE html>
<html>
<head>
<title>个人管理界面</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="../css/mycss/mycss.css" rel="stylesheet">
<script type='text/javascript'>
	function test(arr){
		var array = eval(arr);
	    var fatherForm = document.getElementById("selectUser");
	    for(var i=0;i<array.length;i++){
	    var varItem = new Option(array[i],array[i]);   //objItemText, objItemValue   
	    fatherForm.options.add(varItem);     
		   }
		}
</script>


</head>
<body
	style="background-image: url(''); background-size: cover;">
	<div style="width: 880px; height: 450px;">
		
		<div
			style="border-left: 8px solid #abd241; width: 880px; border-top: 1px solid #abd241; margin-top: 30px">
		<div align="left" id="formdiv"></div>
			<p style="margin-top: 10px; font-size: 15px">
				<?php
				session_start ();
				$user_id = $_SESSION ['gluid'];
				$db = sqlite_open ( "../lfit.db", 0666, $sqliteerror );
				$sql = "select uid,uname from userBasic";
				$res = sqlite_unbuffered_query ( $db, $sql );
				$uidarr = array ();
				$unamearr = array();
				$i = 0;
				while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
					$uidarr [$i] = $item ["uid"];
					$unamearr [$i] = $item ["uname"];
					$i ++;
				}
				$j=0;
				foreach ( $uidarr as $user ) {
					$j++;
					if (file_exists ( "../xmldata/$user.xml" )) {
					echo "User " . $unamearr[$j].":<br/>";
						$xml_array = simplexml_load_file ( "../xmldata/$user.xml" );
						$i = 0;
						foreach ( $xml_array as $tmp ) {
							if ($i == 7) {
								break;
							}
							$goalarr [$i] = $tmp->goal;
							$hrarr [$i] = $tmp->hr;
							$bparrh [$i] = $tmp->bph;
							$bparrl [$i] = $tmp->bpl;
							$i ++;
						}
						echo "最近数据：<br/>运动量：";
						foreach ( $goalarr as $goal ) {
							echo $goal . " ";
						}
						echo "<br/>心率：";
						foreach ( $hrarr as $hr ) {
							echo $hr . " ";
						}
						echo "<br/>收缩压：";
						foreach ( $bparrh as $bph ) {
							echo $bph . " ";
						}
						echo "<br/>舒张压：";
						foreach ( $bparrl as $bpl ) {
							echo $bpl . " ";
						}
						echo "<br/>";
						echo "-----------------------------<br/>";
					} else {
					}
				}
				?>
			</p>
			<form action="../filehandler/feedback.php" method="post"
					enctype="multipart/form-data">
			<select class="selectpicker" style="height:25px;margin-left:1%" name="placeSelect" id="selectUser">
				<option value="-1">toAll</option>
				  </select>
			<script>
			test(<?php echo json_encode($unamearr)?>);
			</script>
		<input type="text" size="20" name="upfile" id="upfile" style="border:1px dotted #ccc" readonly>  
<input type="button" value="上传建议" class="a-upload" onclick="path.click()" style="border:1px solid #ccc;background:#fff">  
<input type="file" id="path" multiple style="display:none" onchange="upfile.value=this.value" name="file[]">
<input type="submit" class="a-upload">
				</form>
		</div>
	</div>
	</script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>