<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <script type="text/javascript" src="assets/jquery.min.js"></script>
	  <script type="text/javascript" src="assets/autobahn.js"></script>
<style>
* {box-sizing: border-box;}
.left {float: left;width: 50%;text-align: center; background-color: #e5e5e5; padding: 15px;}
.right {background-color: #e5e5e5;float: left; width: 50%;padding: 15px;text-align: center;}
@media only screen and (max-width: 1200px) {
  /* For mobile phones: */
  .left, .right {
    width: 100%;
  }
}
</style>
    <script type="text/javascript" src="smoothie.js"></script>
    <script type="text/javascript">
	
	
	/*
	function myYRangeFunction(range) {
  // TODO implement your calculation using range.min and range.max
  var min = ...;
  var max = ...;
  return {min: min, max: max};
}

var chart = new SmoothieChart({millisPerPixel:29,maxValueScale:1.16,minValueScale:1.33,scaleSmoothing:0.462,grid:{millisPerLine:3000,verticalSections:14},labels:{fontSize:7},tooltip:true,tooltipLine:{lineWidth:2,strokeStyle:'#bbbbbb'},maxValue:10000,minValue:-10000,yRangeFunction:myYRangeFunction}),
    canvas = document.getElementById('smoothie-chart'),
    series = new TimeSeries();

chart.addTimeSeries(series, {lineWidth:3.9,strokeStyle:'#00ff00'});
chart.streamTo(canvas, 323);

	*/
	
	

    // Randomly add a data point every 1ms
	var random = new TimeSeries();
	var random2 = new TimeSeries();
	var random3 = new TimeSeries();
	var random4 = new TimeSeries();
	var random5 = new TimeSeries();
	var random6 = new TimeSeries();
	var random7 = new TimeSeries();
	var random8 = new TimeSeries();


		connectWs();
		function connectWs(){
			var conn = new ab.Session('ws://192.168.150.47:8099',
				function() {
					console.log('AB:Connected!');
					//window.webSock = conn;
					conn.subscribe('charts', function(topic, data) {
						// This is where you would add the new article to the DOM (beyond the scope of this tutorial)
						if(topic == 'charts'){
							var ary = [];
							ary = data.data.split(',');
							
							if(data.key == 1){
								
								var i = 0;
								ary.forEach(function(val,index){
								   random.append(Date.now(), val);									
								   if(random.data.length > 1000)delete random.data[i];
								   i++;
								  //
								});
								console.log(random);
		
							}else if(data.key == 2){
								var i = 0;
								ary.forEach(function(val,index){
								   random2.append(Date.now(), val);
								   if(random2.data.length > 1000)delete random2.data[i];
								   i++;

								  //
								});
								console.log(random2);
							}else if(data.key == 3){
								var i = 0;
								ary.forEach(function(val,index){
								   random3.append(Date.now(), val);
								   if(random3.data.length > 1000)delete random3.data[i];
								   i++;

								  //
								});
								console.log(random3);
							}else if(data.key == 4){
								var i = 0;
								ary.forEach(function(val,index){
								   random4.append(Date.now(), val);
								   if(random4.data.length > 1000)delete random4.data[i];
								   i++;
								  //
								});
								console.log(random4);
							}else if(data.key == 5){
								var i = 0;
								ary.forEach(function(val,index){
								   random5.append(Date.now(), val);
								   if(random5.data.length > 1000)delete random5.data[i];
								   i++;

								  //
								});
								console.log(random5);
							}else if(data.key == 6){
								var i = 0 ;
								ary.forEach(function(val,index){
								   random6.append(Date.now(), val);
								   if(random6.data.length > 1000)delete random6.data[i];
								   i++;

								  //
								});
								console.log(random6);
							}else if(data.key == 7){
								var i = 0 ;
								ary.forEach(function(val,index){
								   random7.append(Date.now(), val);
								   if(random7.data.length > 1000)delete random7.data[i];
								   i++;

								  //
								});
								console.log(random7);
							}else if(data.key == 8){
								var i = 0 ;
								ary.forEach(function(val,index){
								   random8.append(Date.now(), val);
								   if(random8.data.length > 1000)delete random8.data[i];
								   i++;

								  //
								});
								console.log(random8);
							}								
							
						}
					});
					
				}, function() {

					window.retryWs = Number(window.retryWs)-Number(1);
					if(window.retryWs > 0){

						setTimeout(function () {
							connectWs();
						}, 5000);

					}
				}
			);
		}
		
	/*setInterval(function() {  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
      if (this.readyState == 4 && this.status == 200) {
		var ary = this.responseText.split(',');
		console.log(ary);
		var x = Date.now();
		ary.forEach(function(val,index){
		 console.log(random);
		   random.append(x, val);
		   x += index*5;
		  //
		});
      }
    }	
//}, setint);*/

	
	function createTimeline() {
		
		var chart = new SmoothieChart();
		chart.addTimeSeries(random, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart.streamTo(document.getElementById("chart"), 10);

		var chart2 = new SmoothieChart();
		chart2.addTimeSeries(random2, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart2.streamTo(document.getElementById("chart2"), 10);
		
		var chart3 = new SmoothieChart();
		chart3.addTimeSeries(random3, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart3.streamTo(document.getElementById("chart3"), 10);
		
		var chart4 = new SmoothieChart();
		chart4.addTimeSeries(random4, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart4.streamTo(document.getElementById("chart4"), 10);
		
		var chart5 = new SmoothieChart();
		chart5.addTimeSeries(random5, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart5.streamTo(document.getElementById("chart5"), 10);
		
		var chart6 = new SmoothieChart();
		chart6.addTimeSeries(random6, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart6.streamTo(document.getElementById("chart6"), 10);
		
		var chart7 = new SmoothieChart();
		chart7.addTimeSeries(random7, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart7.streamTo(document.getElementById("chart7"), 10);
		
		var chart8 = new SmoothieChart();
		chart8.addTimeSeries(random8, { strokeStyle: 'rgba(0, 255, 0, 1)', fillStyle: 'rgba(0, 255, 0, 0.2)', lineWidth: 4 });
		chart8.streamTo(document.getElementById("chart8"), 10);
		
	}
    </script>

  </head>
  <body onload="createTimeline()"  style="font-family:Verdana;color:#aaaaaa;">

<div style="background-color:#e5e5e5;padding:7px;text-align:center;margin-bottom:7px;">
  <h1></h1>
</div>

<div style="overflow:auto;margin-bottom:7px;">
  <div class="left">
    <canvas id="chart" width="600" height="150"></canvas>
  </div>



  <div class="right">
   	<canvas id="chart2" width="600" height="150"></canvas>

  </div>
</div>

<div style="overflow:auto;margin-bottom:7px;">
  <div class="left">
    <canvas id="chart3" width="600" height="150"></canvas>
  </div>



  <div class="right">
   	<canvas id="chart4" width="600" height="150"></canvas>

  </div>
</div>

<div style="overflow:auto;margin-bottom:7px;">
  <div class="left">
    <canvas id="chart5" width="600" height="150"></canvas>
  </div>



  <div class="right">
   	<canvas id="chart6" width="600" height="150"></canvas>

  </div>
</div>

<div style="overflow:auto;margin-bottom:7px;">
  <div class="left">
    <canvas id="chart7" width="600" height="150"></canvas>
  </div>



  <div class="right">
   	<canvas id="chart8" width="600" height="150"></canvas>

  </div>
</div>

<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">© copyright <a href="https://www.avisait.ir/">avisait group</a></div>
</body>
</html>
