<?php
//Example of fetching data from a database using mysqli_connect

$link=mysqli_connect("mysql16.000webhost.com", "a4731696_sitenam", "pob1745", "a4731696_sitenam");

//check the connection
if(!$link) {
	printf("Could not connect to database: %s\n",
	mysqli_connect_error());
		exit();
}

//create the sqlquery
$query="SELECT*FROM staff";

//Execute the query against the database
$result=mysqli_query($link,$query);

if(!$result){
	printf("Error in connection %s\n",
	mysqli_error($link));
	exit();
}

//Fetch the result into an associative array
while($row=mysqli_fetch_assoc($result)) {
	$table[]=$row;
}

if($table) {
	foreach($table as $d_row) {
		echo($d_row["first_name"]."".
		$d_row["last_name"]."<br/>");
	}
}

else {
	echo("No rows to be displayed");
}
mysqli_close($link);
?>