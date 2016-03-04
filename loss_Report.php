<?php # Script 9.6 - view_users.php #2
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/header.html');

// Page header:
echo '<h1>Loss Report</h1>';

require ('../mysqli_connect.php'); // Connect to the db.
		
// Make the query:
$q = "SELECT CONCAT(first_stock, ', ', total_stock) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr FROM footage ORDER BY date_entered ASC";		
$r = @mysqli_query ($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	echo "<p>There are currently $num registered users.</p>\n";

	// Table header.
	echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
	<tr><td align="left"><b>Name</b></td><td align="left"><b>Date Registered</b></td></tr>
';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>
		';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no registered users.</p>';

}

mysqli_close($dbc); // Close the database connection.

include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html');
?>