<form>
  <p>Please Enter the Desired Dates:</p>
  <form action="mathtest.php" method="POST">
  <input type="text" name="fdate" maxlength="10" value="<?php if (isset($_POST['fdate'])) echo $_POST['fdate']; ?>" /><em>formated as yyyy/mm/dd</em>
  <input type="text" name="tdate" mazlength="10" value="<?php if (isset($_POST['tdate'])) echo $_POST['tdate']; ?>"/><em>formated as yyyy/mm/dd</em>
  <p><input type="submit" name="submit" value="Update" /></p>
</form>
<?php
// Connect to the database:
$dbc = mysqli_connect('mysql16.000webhost.com', 'a4731696_sReport', 'pob1745', 'a4731696_sReport');

// Get the origination latitude and longitude:
$q=mysqli_query("SELECT * FROM ctl WHERE date BETWEEN '".fdate."' AND '".tdate."'");

if($row=mysqli_fetch_array($q)) {
	echo $row;
}

// Retrieve the results:


?>


