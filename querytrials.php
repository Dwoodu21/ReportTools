<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('../mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
$sql = "SELECT num_id FROM ctl
		WHERE date = ?
		LIMIT 1";

$stmt = $dbc->prepare($sql);
if($stmt->execute(array($_POST['2014/10/21 ']))) {
	
	$row = $stmt->fetch();
	$id_num = $row['id_num'];
	$stmt->closeCursor();
	
	$sql = "SELECT lot FROM preCtl 
			WHERE id_num = $id_num";
	foreach($link->query($sql) as $row) {
		echo $row['lot'], "</br>";
	}
	
}
?>