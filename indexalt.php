 <?php
//basic connection with error suppression 	
try {
		$handler = new PDO('mysql:host=mysql16.000webhost.com;dbname=a4731696_sReport;', 'a4731696_sReport', 'pob1745');
		$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo $e->getMessage();
		die();
}

$sql = "INSERT INTO guestbook (name, message, posted) VALUES ('Joshua', 'Test', NOW())";
$handler->query($sql); 
//see PDO video 8 and 9 to finish 
	
		

?>