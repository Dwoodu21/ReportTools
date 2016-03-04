<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Distance Calculator</title>
	<link rel="stylesheet" href="style.css">
  </head>
 <body>
  
<?php 
$zip=64154; //user's zip code.
echo "<h1>Nearest stores to $zip:</h1>";

$dbc=mysqli_connect('mysql16.000webhost.com', 'a4731696_zips', 'pob1745', 'zips')
   //get the original lat and long
   
 $q = "SELECT latitude, longitude FROM zip_codes WHERE zip_code='$zip' AND latitude IS NOT NULL";
 $r = mysqli_query($dbc,$q);
   
 //retrieve results
if (mysqli_num_rows($r)) == {
	list($lat, $long) = mysqli_fetch_array($r, MYSQLI_NUM);
	
	//WORD QUERY
	
$q = "SELECT name, CONCAT_WS('<br>', address1, address2), city, state, stores.zip_code, phone,
	ROUND(DEGREES(ACOS(SIN(RADIANS($lat))
	* SIN(RADIANS(latitude))
	+ COS(RADIANS($lat))
	* COS(RADIANS(latitude))
	* COS(RADIANS($long - longitude)))) * 69.09)
	AS distance FROM stores LEFT JOIN zip_codes USING (zip_code)
	ORDER BY distance ASC LIMIT 3";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r)>0) {
	//display stores
	while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
		echo "<h2>$row[0]</h2>"
		<p>$row[1]<br />" . ucfirst(strtolower($row[2])) .", 
		$row[3] $row[4]<br /> (approximately $row[6] miles)</p>\n";
	}//end while loop
}else {
	echo '<p class="error">No stores matched the search.</p>';
	
}else {
	echo '<p class="error">An invalid zip code was entered.</p>';
}
//close
mysqli_close($dbc);

?>
</body>
</html>