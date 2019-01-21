<ol>
	@foreach($box1 as $x)
	<li>{{$x}}</li>
	@endforeach
</ol>
<br><br><br><br><br>

<br><br><br><br><br>
<ol>
	@foreach($res1 as $key=>$value)
	<li><?php echo $key." is at ".$value ?></li>
	@endforeach
</ol>
<br><br><br><br><br>
<ol>
	@foreach($res2 as $key=>$value)
	<li><?php echo "$key is at $value" ?></li>
	@endforeach
</ol>
<br><br><br><br><br>
<ol>
	@foreach($res3 as $key=>$value)
	<li><?php echo "$key is at $value" ?></li>
	@endforeach
</ol>
<br><br><br><br><br>
<ol>
	@foreach($res4 as $key=>$value)
	<li><?php echo "$key is at $value" ?></li>
	@endforeach
</ol>
<br><br><br><br><br>
<ol>
	@foreach($res5 as $key=>$value)
	<li><?php echo "$key is at $value" ?></li>
	@endforeach
</ol>

<?php $x=array_keys($res1);
$y = array_values($res1); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Graph.js</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>
<body>
	<div style="width: 500px;height: 500px;">
		<canvas id="myChart" width="400" height="400"></canvas>
		<script>
			var x =  <?php echo json_encode($x); ?>;
			var y =  <?php echo json_encode($y); ?>;
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: x,
			        datasets: [{
			            label: '% of Votes',
			            data: y,
			            backgroundColor: [
			                'rgba(255, 99, 132, 0.2)',
			                'rgba(54, 162, 235, 0.2)',
			                'rgba(255, 206, 86, 0.2)',
			                'rgba(75, 192, 192, 0.2)',
			                'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 159, 64, 0.2)'
			            ],
			            borderColor: [
			                'rgba(255,99,132,1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
		</script>
		
	</div>

</body>
</html>