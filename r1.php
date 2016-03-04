<?php 
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Rip Saw 1';
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
	
	if (empty($_POST['rone_olen'])) {
		$errors[] = 'You forgot to enter the outbound length.';
	} else {
		$ol = mysqli_real_escape_string($dbc, trim($_POST['rone_olen']));
	}
	
	// Check for a last name:
	if (empty($_POST['rone_owid'])) {
		$errors[] = 'You forgot to enter the outbound width.';
	} else {
		$ow = mysqli_real_escape_string($dbc, trim($_POST['rone_owid']));
	}
	
	// Check for an email address:
	if (empty($_POST['rone_olay'])) {
		$errors[] = 'You forgot to enter the outbound layer.';
	} else {
		$oy = mysqli_real_escape_string($dbc, trim($_POST['rone_olay']));
	}
	
	if (empty($_POST['rone_ilen'])) {
		$errors[] = 'You forgot to enter the outbound length.';
	} else {
		$il = mysqli_real_escape_string($dbc, trim($_POST['rone_ilen']));
	}
	
	// Check for a last name:
	if (empty($_POST['rone_iwid'])) {
		$errors[] = 'You forgot to enter the outbound width.';
	} else {
		$iw = mysqli_real_escape_string($dbc, trim($_POST['rone_iwid']));
	}
	
	// Check for an email address:
	if (empty($_POST['rone_ilay'])) {
		$errors[] = 'You forgot to enter the outbound layer.';
	} else {
		$iy = mysqli_real_escape_string($dbc, trim($_POST['rone_ilay']));
	}
	
			
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO r1 (id_num, rone_olen, rone_owid, rone_olay, rone_ilen, rone_iwid, rone_ilay) VALUES ('$id', '$ol,' '$ow', '$oy', '$il', '$iw', '$iy')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p><br /></p>';	
		
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
<form action="rip.php" method="post">
	<p>Id Number: <input type="text" name="id_num" size="15" maxlength="7" value="<?php if (isset($_POST['id_num'])) echo $_POST['id_num']; ?>" />(7 digit alphanumeric)</p>
	<p>Outbound Length: <input type="text" name="rone_olen" size="15" maxlength="7" value="<?php if (isset($_POST['rone_olen'])) echo $_POST['rone_olen']; ?>" /></p>
	<p>Outbound Width: <input type="text" name="rone_owid" size="15" maxlength="4" value="<?php if (isset($_POST['rone_owid'])) echo $_POST['rone_owid']; ?>" /></p>
	<p>Outbound Layers: <input type="text" name="rone_olay" size="15" maxlength="4" value="<?php if (isset($_POST['rone_olay'])) echo $_POST['rone_olay']; ?>" /></p>
	<p>Inbound Length: <input type="text" name="rone_ilen" size="15" maxlength="7" value="<?php if (isset($_POST['rone_ilen'])) echo $_POST['rone_ilen']; ?>" /></p>
	<p>Inbound Width: <input type="text" name="rone_iwid" size="15" maxlength="4" value="<?php if (isset($_POST['rone_iwid'])) echo $_POST['rone_iwid']; ?>" /></p>
	<p>Inbound Layers: <input type="text" name="rone_ilay" size="15" maxlength="4" value="<?php if (isset($_POST['rone_ilay'])) echo $_POST['rone_ilay']; ?>" /></p>
	
	
	<p><input type="submit" name="submit" value="Update" /></p>
</form>
<?php include ('/home/a4731696/public_html/stockReport/htdocs/includes/footer.html'); ?>