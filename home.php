<?php # Script 3.4 - index.php
$page_title = 'Stock Report';
include ('/home/a4731696/public_html/php_projects/htdocs/includes/header.html');
?>
<h1 id="mainhead">Input Stock Information Here:</h1>
<p>This page is created for my PHP / MySQL project.</p>
<p>Contact my instructor to let him know that I need an A+.</p>
<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for a initial footage:
	if (empty($_POST['first_stock'])) {
		$errors[] = 'You forgot to enter the initial board footage.';
	} else {
		$fs = mysqli_real_escape_string($dbc, trim($_POST['first_stock']));
	}
	
	// Check for the first cut:
	if (empty($_POST['second_stock'])) {
		$errors[] = 'You forgot to enter the first line cut measurement.';
	} else {
		$ss = mysqli_real_escape_string($dbc, trim($_POST['second_stock']));
	}
	
	// Check for the second cut:
	if (empty($_POST['third_stock'])) {
		$errors[] = 'You forgot to enter the ripsaw cut measurement.';
	} else {
		$ts = mysqli_real_escape_string($dbc, trim($_POST['third_stock']));
	}
	
	// Check for the total stock:
	if (empty($_POST['total_stock'])) {
		$errors[] = 'You forgot to enter the final footage.';
	} else {
		$ls = mysqli_real_escape_string($dbc, trim($_POST['final_stock']));
	}
	
	// Check for an email address:
	if (empty($_POST['emp_id'])) {
		$errors[] = 'You forgot to enter your employee id.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['emp_id']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO footage (first_stock, second_stock, third_stock, total_stock, emp_id, date_entered) VALUES ('$fs', '$ss', '$ts', '$ls', '$e', NOW() )";		
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
<h1>Register</h1>
<form action="register.php" method="post">
	<p>Initial Board Footage: <input type="text" name="first_stock" size="5" maxlength="5" value="<?php if (isset($_POST['first_stock'])) echo $_POST['first_stock']; ?>" /></p>
	<p>First Line Cut: <input type="text" name="second_stock" size="5" maxlength="5" value="<?php if (isset($_POST['second_stock'])) echo $_POST['second_stock']; ?>" /></p>
	<p>Ripsaw Cut: <input type="text" name="third_stock" size="5" maxlength="5" value="<?php if (isset($_POST['third_stock'])) echo $_POST['third_stock']; ?>"  /> </p>
	<p>Finished Footage: <input type="total_stock" name="total_stock" size="5" maxlength="5" value="<?php if (isset($_POST['total_stock'])) echo $_POST['total_stock']; ?>"  /></p>
	<p>Employee ID: <input type="emp_id" name="emp_id" size="10" maxlength="20" value="<?php if (isset($_POST['emp_id'])) echo $_POST['emp_id']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form></br>
<h2>Don't forget to cross your fingers!</h2>

<?php
include ('/home/a4731696/public_html/php_projects/htdocs/includes/footer.html');
?>