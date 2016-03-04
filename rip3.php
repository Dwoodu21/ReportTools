<?php 
// This script performs an INSERT query to add a record to the users table.

$page_title = 'RIP';
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
	
	if (empty($_POST['o_len'])) {
		$errors[] = 'You forgot to enter the outbound length.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['o_len']));
	}
	
	// Check for a last name:
	if (empty($_POST['o_wid'])) {
		$errors[] = 'You forgot to enter the outbound width.';
	} else {
		$ow = mysqli_real_escape_string($dbc, trim($_POST['o_wid']));
	}
	
	// Check for an email address:
	if (empty($_POST['o_lay'])) {
		$errors[] = 'You forgot to enter the outbound layer.';
	} else {
		$ol = mysqli_real_escape_string($dbc, trim($_POST['o_lay']));
	}
	
		if (empty($_POST['i_len'])) {
		$errors[] = 'You forgot to enter the outbound length.';
	} else {
		$iln = mysqli_real_escape_string($dbc, trim($_POST['i_len']));
	}
	
	// Check for a last name:
	if (empty($_POST['i_wid'])) {
		$errors[] = 'You forgot to enter the outbound width.';
	} else {
		$iw = mysqli_real_escape_string($dbc, trim($_POST['i_wid']));
	}
	
	// Check for an email address:
	if (empty($_POST['i_lay'])) {
		$errors[] = 'You forgot to enter the outbound layer.';
	} else {
		$il = mysqli_real_escape_string($dbc, trim($_POST['i_lay']));
	}
	
	if (empty($_POST['date'])) {
		$errors[] = 'You forgot to enter the date.';
	} else {
		$da = mysqli_real_escape_string($dbc, trim($_POST['date']));
	}
		
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO r3 (id_num, o_len, o_wid, o_lay, i_len, i_wid, i_lay, date) VALUES ('$id', '$ln', '$ow', '$ol', '$iln', '$iw', '$il', '$da')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You have updated Rip Saw #3 records.</p><p><br /></p>';	
		
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
<h1>Rip Cut Three</h1>
<form action="rip3.php" method="post">
	<p>Id Number: <input type="text" name="id_num" size="15" maxlength="7" value="<?php if (isset($_POST['id_num'])) echo $_POST['id_num']; ?>" />(7 digit alphanumeric)</p>
	<p>Outbound Length: <input type="text" name="o_len" size="15" maxlength="7" value="<?php if (isset($_POST['o_len'])) echo $_POST['o_len']; ?>" /></p>
	<p>Outbound Width: <input type="text" name="o_wid" size="15" maxlength="4" value="<?php if (isset($_POST['o_wid'])) echo $_POST['o_wid']; ?>" /></p>
	<p>Outbound Layers: <input type="text" name="o_lay" size="15" maxlength="4" value="<?php if (isset($_POST['o_lay'])) echo $_POST['o_lay']; ?>" /></p>
	<p>Inbound Length: <input type="text" name="i_len" size="15" maxlength="7" value="<?php if (isset($_POST['i_len'])) echo $_POST['i_len']; ?>" /></p>
	<p>Inbound Width: <input type="text" name="i_wid" size="15" maxlength="4" value="<?php if (isset($_POST['i_wid'])) echo $_POST['i_wid']; ?>" /></p>
	<p>Inbound Layers: <input type="text" name="i_lay" size="15" maxlength="4" value="<?php if (isset($_POST['i_lay'])) echo $_POST['i_lay']; ?>" /></p>
	<p>Date Processed: <input type="text" name="date" size="15" maxlength="10" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" />(date format yyyy-mm-dd)</p>
	
	<p><input type="submit" name="submit" value="Update" /></p>
</form>
<?php include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html'); ?>