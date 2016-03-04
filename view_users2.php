<?php
$page_title = 'View the Current Users';
include ('/home/a4731696/public_html/php_projects/htdocs/includes/header.html');
echo '<h1>Registered Users</h1>';
require_once ('../mysqli_connect2.php');

//Define Query:

$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %D, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC";
$r = @mysqli_query ($dbc, $q);

//Count the number of returned rows
$num = mysqli_num_rows($r);

if ($num > 0) {
	echo "<p>There are currently $num registered users.</p>\n";
	
	//table header
	echo '<table align="center" cellspacing="3" cellspacing="3" width="75%">
	<tr>
		<td align="left"><b>Edit</b></td>
		<td align="left><b>Delete</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>First Name</b></td>
		<td align="left"><b>Date Registered</b></td>
	</tr>';
	
	//Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
				<td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
				<td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
				<td align="left">' . $row['last_name'] . '</td>
				<td align="left">' . $row['first_name'] . '</td>
				<td align="left">' . $row['dr'] . '</td>
			 </tr>';
	}
	
	echo '</table>';
	mysqli_free_result ($r);
}

else {
	echo '<p class="error">There are currently no registered users.</p>';
}
mysqli_close($dbc)

?>
