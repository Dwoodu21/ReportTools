<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['id_num'])) {
		$errors[] = 'You forgot to enter the id tag.';
	} else {
		$fs = mysqli_real_escape_string($dbc, trim($_POST['id_num']));
	}
	
	if (empty($_POST['lot'])) {
		$errors[] = 'You forgot to enter the daily lot letter.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['lot']));
	}
	
	// Check for a last name:
	if (empty($_POST['int_wid'])) {
		$errors[] = 'You forgot to enter the initial width.';
	} else {
		$ss = mysqli_real_escape_string($dbc, trim($_POST['int_wid']));
	}
	
	// Check for an email address:
	if (empty($_POST['int_leng'])) {
		$errors[] = 'You forgot to enter the initial length.';
	} else {
		$ts = mysqli_real_escape_string($dbc, trim($_POST['int_leng']));
	}
	
		
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO preCtl (id_num, lot, int_wid, int_leng) VALUES ('$fs', '$ln', '$ss', '$ts')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You have updated Initial Footage record.</p><p><br /></p>';	
		
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
<h1>Initial Footage</h1>
<form action="register.php" method="post">
	<p>Id Number: <input type="text" name="id_num" size="15" maxlength="7" value="<?php if (isset($_POST['id_num'])) echo $_POST['id_num']; ?>" />(Should be 7 digits)</p>
	<p>Daily identifier: <input type="text" name="lot" size="15" maxlength="7" value="<?php if (isset($_POST['lot'])) echo $_POST['lot']; ?>" />(One letter A-Z)</p>
	<p>Initial Width: <input type="text" name="int_wid" size="15" maxlength="4" value="<?php if (isset($_POST['int_wid'])) echo $_POST['int_wid']; ?>" /></p>
	<p>Initial Length: <input type="text" name="int_leng" size="15" maxlength="4" value="<?php if (isset($_POST['int_leng'])) echo $_POST['int_leng']; ?>" /></p>
	
	
	<p><input type="submit" name="submit" value="Update" /></p>
</form>
<?php include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html'); ?>