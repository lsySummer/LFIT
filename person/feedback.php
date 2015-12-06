	<!DOCTYPE html>
<html>
   <head>
     
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">


    <link href="../css/mycss/mycss.css" rel="stylesheet">

	
   </head>
   <body style="background-image:url('');background-size:cover; ">

	
	<div class="tabbable" id="tabs-112430">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-168923" data-toggle="tab">来及医生</a>
					</li>
					<li>
						<a href="#panel-564688" data-toggle="tab">来自教练</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-168923" style="height:180px;width:880px">
					
						
		<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
						<p style="margin-top:10px;font-size:15px">
								<?php
								session_start();
								$user_name = $_SESSION['gluname'];
								$db = sqlite_open("../lfit.db",0666,$sqliteerror);
								$sql = "select * from dfeedback where uname='$user_name' order by udate desc";
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
								$sql = "select * from excelurl where uname='$user_name'";
								$res = sqlite_unbuffered_query ( $db, $sql );
								error_reporting(E_ALL ^ E_NOTICE);
								require_once 'excel_reader2.php';
								while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
									$url=$item["url"];
									$date=$item["udate"];
									$dname=$item["dname"];
									$color="#000000";
									$size="3";
									echo "<font color=".$color." size=".$size.">";
									$data = new Spreadsheet_Excel_Reader($url);
									$data->setOutputEncoding('UTF-8');
									echo $data->dump(true,true);
									echo "<br/>";
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$date."   "."from doctor".$dname."<br/>";
									echo "<br/>";
									echo "<br/>";
									echo "</font>";
								}
							?>
						</p>
					</div>
					</div>
					
					<div class="tab-pane" id="panel-564688" style="height:480px;width:880px">
						<div class="tab-pane active" id="panel-168923">
							<div style="border-left:8px solid #abd241;width:880px;border-top:1px solid #abd241;margin-top:30px">
							<p style="margin-top:10px;font-size:15px">
									<?php
								$db = sqlite_open("../lfit.db",0666,$sqliteerror);
								$sql = "select * from cfeedback where uname='$user_name' order by udate desc";
								$res = sqlite_unbuffered_query ( $db, $sql );
								while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
								$info=$item["info"];
								$date=$item["udate"];
								$cname=$item["cname"];
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
								$sql = "select * from cexcelurl where uname='$user_name'";
								$res = sqlite_unbuffered_query ( $db, $sql );
								error_reporting(E_ALL ^ E_NOTICE);
								require_once 'excel_reader2.php';
								while ( $item = sqlite_fetch_array ( $res, SQLITE_ASSOC ) ) {
									$url=$item["url"];
									$date=$item["udate"];
									$dname=$item["cname"];
									$color="#000000";
									$size="3";
									echo "<font color=".$color." size=".$size.">";
									$data = new Spreadsheet_Excel_Reader($url);
									$data->setOutputEncoding('UTF-8');
									echo $data->dump(true,true);
									echo "<br/>";
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$date."   "."from coach".$dname."<br/>";
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
			</div>
			<script type="text/javascript">
				$(function(){
				   $(".close").click(function(){
					  $("#myAlert").alert('close');
				   });
				});  

				</script>   
			<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../js/bootstrap.js"></script>
	</body>
</html>