 <!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />	
<link href="CSS, Font, Images for form\CodeCSS.css" rel="stylesheet" />
</head>

<?php
mysql_connect("", "", ""); 

mysql_select_db("bscocdir_ccourse"); 

if(isset($_REQUEST['submit']))
{

$errorMessage = "";

$Gender =""; 
$Firstname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$toc=$_POST['toc'];
$Saddress=$_POST['Saddress'];
$City=$_POST['City'];
$State=$_POST['State'];
$Pincode=$_POST['Pincode'];
$Home=$_POST['Home'];
$Work=$_POST['Work'];
$Email=$_POST['Email'];
@$Aaddress = $_POST['Aaddress'];
 
//Field validation 
if(empty($Firstname)) {
      $errorMessage .= "<li>You forgot to enter a first name!</li>";
   }
if(empty($Lastname)) {
      $errorMessage .= "<li>You forgot to enter a last name!</li>";
   }
if(empty($toc)) {
      $errorMessage .= "<li>You forgot to select a course!</li>";
   }
if(empty($Saddress)) {
      $errorMessage .= "<li>You forgot to enter street address!</li>";
   }
if(empty($City)) {
      $errorMessage .= "<li>You forgot to enter city!</li>";
   }
if(empty($State)) {
      $errorMessage .= "<li>You forgot to enter state!</li>";
   }
if(empty($Pincode)) {
      $errorMessage .= "<li>You forgot to enter a zipcode!</li>";
   }
if(empty($Home)) {
      $errorMessage .= "<li>You forgot to enter home phone number!</li>";
   }

   if(empty($Email)) {
      $errorMessage .= "<li>You forgot to enter email id!</li>";
   }

//check if the number field is numeric
if(is_numeric(trim($Pincode)) == false ) {
$errorMessage .= "<li>Please enter numeric values!</li>";
}
if(is_numeric(trim($Home)) == false ) {
$errorMessage .= "<li>Please enter numeric values!</li>";
}

//check if the length of field is upto required
if(strlen($Pincode)!=5) {
$errorMessage .= "<li>Pincode should be 5 digits only!</li>";
}

//check for valid email format 
if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $Email)) {
$errorMessage .= "<li>You did not enter a invalid email!</li>";
}

if ($errorMessage != "" ) { 
	echo "<p class='message'>" .$errorMessage. "</p>" ;}

else{
	//Inserting record in table using INSERT query
	$insertTB="INSERT INTO personal (`Firstname`, `Lastname`, `toc`, `Saddress`, `Aaddress`, `City`, `State`, `Pincode`, `Home`, `Work`, `Email`, reg_date) VALUES 
	('$Firstname', '$Lastname', '$toc', '$Saddress', '$Aaddress', '$City', '$State', '$Pincode', '$Home', '$Work', '$Email', NOW())"; 
	
	mysql_query($insertTB); 
	
}
if ($insertTB) {
	echo '<h1>Thank You!</h1>
		<p>You have signed up for our correspondence course</p><br>';
	$to ='dwoodu21@gmail.com';
	$subject ='Correspondence Course!';
	$body = 'You have someone signing up for a correspondence course.';
	mail($to, $subject, $body);
}


}
?>

<body>	
<form id="masteringhtml5_form" action="" method="POST">
<label for="heading" class="heading">Broad Street Bible Courses</label>
	<fieldset class="fieldset_border">
		<legend class="legend">Student Information</legend>
		<div>
		<label for="name">Name</label><br>
		<input type="text" name="Firstname"  class="name txtinput" placeholder="First" autofocus>
		<input type="text" name="Lastname" class="name txtinput" placeholder="Last">
		</div><br>
		<div class="div_outer_dob">
			<div class="div_dob">
				<label for="toc">Select a Course</label><br>
				<input type="radio" name="toc"  value="sib" ><span>Studies in Bible</span>
				<input type="radio" name="toc"  value="gps" ><span>God's plan of salvation</span>
				<input type="radio" name="toc"  value="ihbs" ><span>In home Bible study (Statesville, NC only)</span>
			</div>
		</div>
			
		<div class="div_outer_address" >
		<label for="address">Address</label><br>
		<input type="text" name="Saddress"  class="txtinput tb address_img" placeholder="Street Address"><br>
		<input type="text" name="Aaddress" class="txtinput tb address_img" placeholder="Address Line 2"><br>
		<input type="text" name="City"  class="txtinput tb1 address_img" placeholder="City">  
		<input type="text" name="State" class="txtinput tb1 address_img" placeholder="State"><br>
		<input type="text" name="Pincode" class="txtinput tb1 address_img" placeholder="Zipcode">
		</div><br>
		<div>
		<label for="contact">Phone Number</label><br>
		<input type="tel" name ="Home" class="txtinput tb1 home_tel" placeholder="Home"> 
		<input type="tel" name="Work" class="txtinput tb1 work_tel" placeholder="Alt"">
		</div><br>
		<div>
		<label for="email">Email Address</label><br>
		<input type="email" name="Email" class="txtinput tb1 email" placeholder="email@example.com">
		</div>
	</fieldset>
<br>

	<div class="submit">
		<input type="submit" name="submit" class="submit_btn" value="Submit">
	</div>
</form>	
</body>
</html>