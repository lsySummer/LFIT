<html>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<body>
 <?php 
 $a=30;
 ?>

<script type="text/javascript">
 var a = <?php echo $a;?>;
 window.alert(a);

</script>
</body>
</html>

 for(var i=0;i<7;i++){
	a[i] = <?php echo $goalarr[i];?>;
	}
<form action="../filehandler/todayData.php" method="post"
					enctype="multipart/form-data">
					<input type="file" name="file" id="fileField" size="20"
						style="float: left; margin-top: 1%" /> <input type="submit"
						class="btn-sm btn-default" name="submit" value="上传"
						style="float: left" />
				</form>
				
				<div id="myAlert" class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>提示！</strong>您有新的未读消息！
		</div>
		
			 <span class="label" style="background-color:#999999;margin-top:40px;margin-left:700px">
							<?php echo $date?></span>
						 <span class="label" style="background-color:#999999;">
							<?php echo "doctor ".$dname?></span>
							
							
							
							
							
											<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
						<p style="margin-top:10px;font-size:15px">
							<?php
								session_start();
								$user_name = $_SESSION['gluname'];
								$db = sqlite_open("../lfit.db",0666,$sqliteerror);
								$sql = "select * from dfeedback where uname='$user_name'";
								$res = sqlite_unbuffered_query ( $db, $sql );
								while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
								$info=$item["info"];
								$date=$item["udate"];
								$dname=$item["dname"];
								$color="#000000";
								$size="3";
								echo "<font color=".$color." size=".$size.">";
								echo $info."<br/>";
								echo "<br/>";
								echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$date."   "."from doctor".$dname."<br/>";
								echo "<br/>";
								echo "<br/>";
								echo "</font>";
								}
							?>
						</p>
					
					</div>
					
					<div class="tab-pane" id="panel-564688" style="height:480px;width:880px">
						<div class="tab-pane active" id="panel-168923">
							<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
							<p style="margin-top:10px;font-size:15px">
							<?php
								$db = sqlite_open("../lfit.db",0666,$sqliteerror);
								$sql = "select * from cfeedback where uname='$user_name'";
								$res = sqlite_unbuffered_query ( $db, $sql );
								while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
								$info=$item["info"];
								$date=$item["udate"];
								$dname=$item["cname"];
								$color="#000000";
								$size="3";
								echo "<font color=".$color." size=".$size.">";
								echo $info."<br/>";
								echo "<br/>";
								echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$date."   "."from coach".$cname."<br/>";
								echo "<br/>";
								echo "<br/>";
								echo "</font>";
								}
							?>
							</p>
					</div>
					</div>
				</div>
			</div>