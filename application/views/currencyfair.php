<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Currency Fair</title>
	<link rel="stylesheet" href="/currency-fair/assets/css/main.css">
</head>
<body>

<div id="container">
	<h1>REAL-TIME DATA</h1>
	
	<div class="panels">
	<div id="connections">
		Please start the Api requests to see the real-time data...<br/>
	</div>
	<div id="latest_conversions">
			<table>
				<thead>
					<tr>
						<th>Converter From</th>
						<th>Converted To</th>
						<th>Exchange Rate</th>
					</tr>
				</thead>
				<tbody class="conversions">
					<?php echo($conversions);?>
				</tbody>
				
			</table>
		</div>
	</div>
	
	<h3>Conversion Volume</h3>
	
	<div class="highchart-container"></div>
		
		<div id="panel2">
			<table class="highchart"  data-graph-container=".. .. .highchart-container" data-graph-type="column">
				<thead>
					<tr>
						<th>Conversion Pairs</th>
						<th>Volume</th>
					</tr>
				</thead>
				<tbody class="conversion_pairs">
					<tr>
						<?php echo($pairs);?>
					</tr>
				</tbody>
			</table>
		</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript"></script>
<script src="http://highcharttable.org/js/highcharts.js" type="text/javascript"></script>
<script src="http://code.highcharttable.org/master/jquery.highchartTable-min.js" type="text/javascript"></script>
<script src="/currency-fair/assets/js/main.js" type="text/javascript"></script>
</body>
</html>