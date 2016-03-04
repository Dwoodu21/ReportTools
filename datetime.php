<!DOCTYPE html>
	<head>
	<style type="text/css" media="screen">
	body {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		margin: 10px;
		}
	label {
		font-weight:bold;
		}
	.error {
		color:#F00;
	}
	</style>
	</head>
<body>
<?php #Script 16.5 - datetime.php
	//Set the start and end date as today and tomorrow by default:
	$start = new DateTime();
	$end = new DateTime();
	$end->modify('+1 day');
	
	//Default format for displaying dates:
	$format='m/d/Y';
	
	//This function validates a provided date string
	function validate_date($date) {
		$date_array=explode('/', $date);
		
		if (count($date_array)!=3) return false;
		if (!checkdate($date_array[0], $date_array[1], $date_array[2])) return false;
		
		return $date_array;
	} //End of validate_date function
	
	//Time to check for a form submission
	if (isset($_POST['start'], $_POST['end'])) {
	if ( (list($sm, $sd, $sy) = validate_date($_POST['start'])) && (list($em, $ed, $ey)= validate_date($_POST['end'])) ){
			$start->setDate($sy, $sm, $sd);
			$end->setDate($ey, $em, $ed);
		//Start date has to come first
		if ($start < $end) {
			$interval = $start->diff($end);
		// Print the results:
		echo "<p>The event has been planned starting on {$start->format($format)} and ending on {$end->format($format)}, which is a period of $interval->days day(s),</p>";
		}
		else {
			echo '<p class="error">The starting date must precede the ending date.</p>';
		}
		} 
		else {
			echo '<p class="error">One or both of the submitted dates was invalid.</p>';
		}
	}//End of Form submission
	?>
<h2>Set the Start and End Dates for the Thing</h2>
<form action="datetime.php" method="post">
	<p><label for ="start_date">Start Date:</label> <input type="text" name="start_date"
	value="<?php echo $start->format($format); ?>" /> (MM/DD/YYYY)</p>
	<p><label for="end_date">End Date:</label> <input type="test" name="end_date"
	value="<?php echo $end->format($format); ?>" /> (MM/DD/YYYY)</p>
	
	<p><input type="submit" value="Submit" /></p>    
	
	