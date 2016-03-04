<?php
//declare class
class Rectangle {
	//attributes
	public $width = 0;
	public $length = 0;
	
	//method to set the dimensions
	function setSize($w = $mysqli->real_escape_string(trim($_GET)), $h = 0) {
		$this->width = $w;
		$this->length = $l;
	}
	
	//let's calculate
	function getArea() {
		return ($this->width * $this->length);
	}
 } //end of the rectangle class
?>