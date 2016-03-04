<?php # Script 10.4
$page_title = 'View the Current Users';
	include('/home/a4731696/public_html/stockReport/htdocs/includes/headerR.html');
	echo '<h1>Registered Users</h1>';
	require ('../mysqli_connect.php');
	
	//Number of records to show per page;
	$display = 10;
	
	//Determine how many pages;
	if (isset($_GET['p']) && is_numeric ($_GET['p'])) {
		$pages = $_GET['p'];
	} else {$q="SELECT COUNT(user_id) FROM users";
		$r = @mysqli_fetch_array ($r,MYSQLI_NUM);
		$records = $row[0];
	//calculate the number of pages;
	if ($records > $display) {
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
	} //end of p IF
	
	//Determine where in the database to start returning results 
	
	if (isset($_GET['s']) && is_numeric ($_GET['s'])) {
		$start = $_GET['s'];
	}  else {
		$start = 0;
	}
	
	
	