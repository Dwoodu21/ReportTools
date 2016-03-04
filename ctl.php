<?php 
// This script performs an INSERT query to add a record to the users table.

$page_title = 'CTL';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['id_num'])) {
		$errors[] = 'You forgot to enter the id tag.';
	} else {
		$id = mysqli_real_escape_string($dbc, trim($_POST['id_num']));
	}
	
	if (empty($_POST['out_len'])) {
		$errors[] = 'You forgot to enter the outbound length.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['out_len']));
	}
	
	// Check for a last name:
	if (empty($_POST['out_wid'])) {
		$errors[] = 'You forgot to enter the outbound width.';
	} else {
		$ow = mysqli_real_escape_string($dbc, trim($_POST['out_wid']));
	}
	
	// Check for an email address:
	if (empty($_POST['out_lay'])) {
		$errors[] = 'You forgot to enter the outbound layer.';
	} else {
		$ol = mysqli_real_escape_string($dbc, trim($_POST['out_lay']));
	}
	
	if (empty($_POST['date'])) {
		$errors[] = 'You forgot to enter the date.';
	} else {
		$da = mysqli_real_escape_string($dbc, trim($_POST['date']));
	}
		
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO ctl (id_num, out_len, out_wid, out_lay, date) VALUES ('$id', '$ln', '$ow', '$ol', '$da')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You updated Cut To Length record.</p><p><br /></p>';	
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<h1>Cut To Length</h1>
<form action="ctl.php" method="post">
	<p>Id Number: <input type="text" name="id_num" size="15" maxlength="7" value="<?php if (isset($_POST['id_num'])) echo $_POST['id_num']; ?>" />(Seven digit alphanumeric)</p>
	<p>Outbound Length: <input type="text" name="out_len" size="15" maxlength="7" value="<?php if (isset($_POST['out_len'])) echo $_POST['out_len']; ?>" /></p>
	<p>Outbound Width: <input type="text" name="out_wid" size="15" maxlength="4" value="<?php if (isset($_POST['out_wid'])) echo $_POST['out_wid']; ?>" /></p>
	<p>Outbound Layers: <input type="text" name="out_lay" size="15" maxlength="4" value="<?php if (isset($_POST['out_lay'])) echo $_POST['out_lay']; ?>" /></p>
	<p>Date Processed: <input type="text" name="date" size="15" maxlength="10" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" />(format yyyy-mm-dd)</p> 
	
	<p><input type="submit" name="submit" value="Update" /></p>
</form>
<?php include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html'); ?>