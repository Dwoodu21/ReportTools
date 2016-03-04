<?php
$page_title = 'View the volume results.';
include ('/home/a4731696/public_html/stockReport/htdocs/includes/header.html');

echo ('<h1>Here is your ordered report</h1>');

require ('../mysqli_connect.php');

$q = "SELECT CONCAT(first_stock, ', ', second_stock, ', ', third_stock, ', ', total_stock) AS totals, DATE_FORMAT (date_entered, '%M %d, %Y') 
AS dr FROM footage ORDER BY date_entered ASC";

class Box {
	
	private $_length;
	private $_width;
	private $_height;
	
	public function Box($length, $width, $height) {
		$this->_length=$length;
		$this->_width=$width;
		$this->_height=$height;
	}
	
	public function volume() {
		return $this->_length*$this->_width^$this->_height;
	}
}

$myBox=new Box(20,10,5);
$myVolume=$myBox->volume();
echo("Volume = " .$myVolume. "<br/>");

$myBox=new Box SELECT(first_stock, second_stock, total_stock) FROM footage;
?>