<?php

$page_title = 'Register';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require ('../mysqli_oop_connect.php');

	$errors = array(); //Initialize an error array.
	
	$mysqli->real_escape_string();
	$in = $mysqli->real_escape_string(trim($_POST['id_num']));
	$ol = $mysqli->real_escape_string(trim($_POST['out_len']));
	$ow = $mysqli->real_escape_string(trim($_POST['out_wid']));
	$os = $mysqli->real_escape_string(trim($_POST['out_lay']));
	$da = $mysqli->real_escape_string(trim($_POST['date']));
	
} //this culy brace is for line 6 
?>
