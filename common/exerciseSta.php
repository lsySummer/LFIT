<!DOCTYPE html>
<html>

<head>

  <title>HTML5 Canvas DEMO</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	 <link rel="stylesheet" href="../css/mycss/style.css" media="screen" type="text/css" />
</head>

<body>



	<div style="margin-top:1%;margin-left:2%;width:80%">
		<span style="background-color: white;float:left;font-size:20px">		
		<?php 
			$goalarr = array();
			$hrarr = array();
			$bparrh=array();
			$bparrl=array();
		session_start();
		$user_id = $_SESSION['gluid'];
		$user_name = $_SESSION['gluname'];
		if(file_exists("../xmldata/$user_name.xml")){
			$xml_array=simplexml_load_file("../xmldata/$user_name.xml");
			$i=0;
			foreach($xml_array as $tmp){
				if($i==7){break;}
				$goalarr[$i]=$tmp->goal;
				$hrarr[$i]=$tmp->hr;
				$bparrh[$i]=$tmp->bph;
				$bparrl[$i]=$tmp->bpl;
				$i++;
			}
		}
		else{
			echo "暂无数据";
		}
		?>
		</span>
		
		<button class="btn btn-success" type="button"  onclick="reset0();" style="float:left;margin-left:3%">运动量变化</button>
		<button class="btn btn-success" type="button"  onclick="reset1();" style="float:left;margin-left:3%">心率变化</button>
		<button class="btn btn-success" type="button" onclick="reset2();" style="float:left;margin-left:3%">收缩压变化</button>
		<button class="btn btn-success" type="button" onclick="reset3();" style="float:left;margin-left:3%">舒张压变化</button>
		<h3><span class="label label-default" id="lastSeven">最近七天数据：</span></h3>
	</div>
	
  <script type="text/javascript">

var LineChart = function( options ) {

 var data = options.data;
 var canvas = document.body.appendChild( document.createElement( 'canvas' ) );
 var context = canvas.getContext( '2d' );

 var rendering = false,
     paddingX = 40,
     paddingY = 40,
     width = options.width || window.innerWidth,
     height = options.height || window.innerHeight,
     progress = 0;

 canvas.width = width;
 canvas.height = height;

 var maxValue,
     minValue;

 var y1 = paddingY + ( 0.05 * ( height - ( paddingY * 2 ) ) ),
     y2 = paddingY + ( 0.50 * ( height - ( paddingY * 2 ) ) ),
     y3 = paddingY + ( 0.95 * ( height - ( paddingY * 2 ) ) );
 
	
 format();
 render();
 
 function format( force ) {

   maxValue = 0;
   minValue = Number.MAX_VALUE;
   
   data.forEach( function( point, i ) {
     maxValue = Math.max( maxValue, point.value );
     minValue = Math.min( minValue, point.value );
   } );

   data.forEach( function( point, i ) {
     point.targetX = paddingX + ( i / ( data.length - 1 ) ) * ( width - ( paddingX * 2 ) );
     point.targetY = paddingY + ( ( point.value - minValue ) / ( maxValue - minValue ) * ( height - ( paddingY * 2 ) ) );
     point.targetY = height - point.targetY;
 
     if( force || ( !point.x && !point.y ) ) {
       point.x = point.targetX + 30;
       point.y = point.targetY;
       point.speed = 0.04 + ( 1 - ( i / data.length ) ) * 0.05;
     }
   } );
   
 }

 function render() {

   if( !rendering ) {
     requestAnimationFrame( render );
     return;
   }
   
   context.font = '10px sans-serif';
   context.clearRect( 0, 0, width, height );

   context.fillStyle = '#222';
   context.fillRect( paddingX, y1-60, width - ( paddingX * 2 ), 1 );
   context.fillRect( paddingX, y2-60, width - ( paddingX * 2 ), 1 );
   context.fillRect( paddingX, y3-60, width - ( paddingX * 2 ), 1 );
   
   if( options.yAxisLabel ) {
     context.save();
     context.globalAlpha = progress;
     context.translate( paddingX - 15, height - paddingY - 10 );
     context.rotate( -Math.PI / 2 );
     context.fillStyle = '#fff';
     context.fillText( options.yAxisLabel, 0, 0 );
     context.restore();
   }

   var progressDots = Math.floor( progress * data.length );
   var progressFragment = ( progress * data.length ) - Math.floor( progress * data.length );

   data.forEach( function( point, i ) {
     if( i <= progressDots ) {
       point.x += ( point.targetX - point.x ) * point.speed;
       point.y += ( point.targetY - point.y ) * point.speed;

       context.save();
       
       var wordWidth = context.measureText( point.label ).width;
       context.globalAlpha = i === progressDots ? progressFragment : 1;
       context.fillStyle = point.future ? '#aaa' : '#fff';
       context.fillText( point.label, point.x - ( wordWidth / 2 ), height - 18 );

       if( i < progressDots && !point.future ) {
         context.beginPath();
         context.arc( point.x, point.y, 4, 0, Math.PI * 2 );
         context.fillStyle = '#abd241';
         context.fill();
       }

       context.restore();
     }

   } );

   context.save();
   context.beginPath();
   context.strokeStyle = '#abd241';
   context.lineWidth = 2;

   var futureStarted = false;

   data.forEach( function( point, i ) {

     if( i <= progressDots ) {

       var px = i === 0 ? data[0].x : data[i-1].x,
           py = i === 0 ? data[0].y : data[i-1].y;

       var x = point.x,
           y = point.y;

       if( i === progressDots ) {
         x = px + ( ( x - px ) * progressFragment );
         y = py + ( ( y - py ) * progressFragment );
       }

       if( point.future && !futureStarted ) {
         futureStarted = true;

         context.stroke();
         context.beginPath();
         context.moveTo( px, py );
         context.strokeStyle = '#aaa';

         if( typeof context.setLineDash === 'function' ) {
           context.setLineDash( [2,3] );
         }
       }

       if( i === 0 ) {
         context.moveTo( x, y );
       }
       else {
         context.lineTo( x, y );
       }

     }

   } );

   context.stroke();
   context.restore();

   progress += ( 1 - progress ) * 0.02;
 
   requestAnimationFrame( render );

 }
 
 this.start = function() {
   rendering = true;
 }
 
 this.stop = function() {
   rendering = false;
   progress = 0;
   format( true );
 }
 
 this.restart = function() {
   this.stop();
   this.start();
 }
 
 this.append = function( points ) {    
   progress -= points.length / data.length;
   data = data.concat( points );
   
   format();
 }
 
 this.populate = function( points ) {    
   progress = 0;
   data = points;
   
   format();
 }

};

var chart = new LineChart({ data: [] });

reset0();

chart.start();

function append() {
 chart.append([
   { label: 'Rnd', value: 1300 + ( Math.random() * 1500 ), future: true }
 ]);
}

function restart() {
 chart.restart();
}

function reset0() {
 chart.populate([
   { label: 'One', value: <?php echo $goalarr[0];?>},
   { label: 'Two', value: <?php echo $goalarr[1];?>},
   { label: 'Three', value:<?php echo $goalarr[2];?> },
   { label: 'Four', value: <?php echo $goalarr[3];?>  },
   { label: 'Five', value: <?php echo $goalarr[4];?>  },
   { label: 'Six', value: <?php echo $goalarr[5];?>  },
   { label: 'Seven', value: <?php echo $goalarr[6];?>,future:true  },
 ]);
 document.getElementById("lastSeven").innerText="最近七天数据："+<?php echo $goalarr[0];?>+" "+<?php echo $goalarr[1];?>
 +" "+<?php echo $goalarr[2];?>+" "+<?php echo $goalarr[3];?>+" "+<?php echo $goalarr[4];?>
 +" "+<?php echo $goalarr[5];?>+" "+<?php echo $goalarr[6];?>;
}
function reset1() {
	 chart.populate([
	   { label: 'One', value: <?php echo $hrarr[0];?>},
	   { label: 'Two', value: <?php echo $hrarr[1];?>},
	   { label: 'Three', value:<?php echo $hrarr[2];?> },
	   { label: 'Four', value: <?php echo $hrarr[3];?>  },
	   { label: 'Five', value: <?php echo $hrarr[4];?>  },
	   { label: 'Six', value: <?php echo $hrarr[5];?>  },
	   { label: 'Seven', value: <?php echo $hrarr[6];?>,future:true  },
	 ]);
	 document.getElementById("lastSeven").innerText="最近七天数据："+<?php echo $hrarr[0];?>+" "+<?php echo $hrarr[1];?>
	 +" "+<?php echo $hrarr[2];?>+" "+<?php echo $hrarr[3];?>+" "+<?php echo $hrarr[4];?>
	 +" "+<?php echo $hrarr[5];?>+" "+<?php echo $hrarr[6];?>;
	}
function reset2() {
	 chart.populate([
	   { label: 'One', value: <?php echo $bparrh[0];?>},
	   { label: 'Two', value: <?php echo $bparrh[1];?>},
	   { label: 'Three', value:<?php echo $bparrh[2];?> },
	   { label: 'Four', value: <?php echo $bparrh[3];?>  },
	   { label: 'Five', value: <?php echo $bparrh[4];?>  },
	   { label: 'Six', value: <?php echo $bparrh[5];?>  },
	   { label: 'Seven', value: <?php echo $bparrh[6];?>,future:true  },
	 ]);
	 document.getElementById("lastSeven").innerText="最近七天数据："+<?php echo $bparrh[0];?>+" "+<?php echo $bparrh[1];?>
	 +" "+<?php echo $bparrh[2];?>+" "+<?php echo $bparrh[3];?>+" "+<?php echo $bparrh[4];?>
	 +" "+<?php echo $bparrh[5];?>+" "+<?php echo $bparrh[6];?>;
	}
function reset3() {
	 chart.populate([
	   { label: 'One', value: <?php echo $bparrl[0];?>},
	   { label: 'Two', value: <?php echo $bparrl[1];?>},
	   { label: 'Three', value:<?php echo $bparrl[2];?> },
	   { label: 'Four', value: <?php echo $bparrl[3];?>  },
	   { label: 'Five', value: <?php echo $bparrl[4];?>  },
	   { label: 'Six', value: <?php echo $bparrl[5];?>  },
	   { label: 'Seven', value: <?php echo $bparrl[6];?>,future:true  },
	 ]);
	 document.getElementById("lastSeven").innerText="最近七天数据："+<?php echo $bparrl[0];?>+" "+<?php echo $bparrl[1];?>
	 +" "+<?php echo $bparrl[2];?>+" "+<?php echo $bparrl[3];?>+" "+<?php echo $bparrl[4];?>
	 +" "+<?php echo $bparrl[5];?>+" "+<?php echo $bparrl[6];?>;	
	}


  </script>

</body>

</html>