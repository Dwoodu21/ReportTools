<?php

DEFINE ('DB_USER', 'a4731696_sitenam');
DEFINE ('DB_PASSWORD', 'pob1745');
DEFINE ('DB_HOST', 'mysql16.000webhost.com');
DEFINE ('DB_NAME', 'a4731696_sitenam');

$mysqli = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	unset($mysqli);
} else {//set the encoding
	$mysqli->set_charset('utf8');
}
echo '<pre>' . print_r($mysqli, 1) . '</pre>';
?>
