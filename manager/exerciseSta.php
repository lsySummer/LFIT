﻿<!DOCTYPE html>
<html>

<head>

  <title>HTML5 Canvas DEMO</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	 <link rel="stylesheet" href="../css/mycss/style.css" media="screen" type="text/css" />
</head>

<body>

	<div style="margin-top:20px">
	    <button class="btn btn-success btn-sm" type="button"   style="margin-left:0px;margin-top:7px">开始日期</button><br/>
		<button class="btn btn-success btn-sm" type="button"   style="margin-left:0px;margin-top:32px">结束日期</button>
	</div>

	<div class="form-group" style="margin-left:80px">
		
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd"
				style="width:240px;margin-top:20px">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
          
                <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd"
				style="width:240px;margin-top:10px">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" /><br/>
           
	</div>
			
			<script type="text/javascript" src="../jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.zh-CN" charset="UTF-8"></script>
<script type="text/javascript">


	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });	

</script>

<div style="text-align:center;position: absolute;left: 5px;top: 5px;">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
  <script src="../js/js0/index.js"></script>

</body>

</html>