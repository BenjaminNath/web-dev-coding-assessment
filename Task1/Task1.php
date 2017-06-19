<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task 1</title>

	<!-- Custom Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="task1.css">
</head>
<body>
<?php
$date = strtotime(date("Y-m-d"));

$today = date('d');
$month = date('m', $date);
$year = date('Y');

$monthLength = cal_days_in_month(0, $month, $year);
$days = array();
$currentMonth = date('F', $date);
$time = strtotime('next sunday');

for($i = 0; $i < 7; $i++){
	$days[] = strftime('%A', $time);
	$time = strtotime('+1 day', $time);
}

$dateString = date('w', strtotime("{$month}-{$today}-{$year}"));
?>	

	<div class="container text-center calendar">
		<div class="row">
			<table class="table table-responsive table-bordered">
				<tr>
					<th colspan="7" class="text-center"><?php echo $currentMonth, " ", $year?></th>
				</tr>
				<tr>
					<?php foreach ($days as $key => $weekDay) : ?>
						<td class="weekday"><?php echo $weekDay ?></td>
					<?php endforeach ?>
				</tr>
				<tr>
					<?php for($i = 0; $i <= $dateString-1; $i++): ?>
						<td class="date"></td>
					<?php endfor; ?>
					<?php for($i = 1; $i <= $monthLength; $i++): ?>
						<?php if($today - 1 == $i): ?>
							<td class="date active"><strong><?php echo $i ?></strong></td>
						<?php else: ?>
							<td class="date"><?php echo $i ?></td>
						<?php endif; ?>
						<?php if(($i + $dateString) % 7 == 0): ?>
							<tr></tr>
						<?php endif; ?>
					<?php endfor ?>
					<?php for($i = 0; ($i + $dateString + $monthLength) % 7 != 0; $i++): ?>
						<td></td>
					<?php endfor ?>
				</tr>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<footer class="text-center">
				<a href="http://benjaminnath.github.io">Benjamin Nath</a>
			</footer>
				
		</div>
	</div>
</body>
</html>