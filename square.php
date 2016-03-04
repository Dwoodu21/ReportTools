<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Square</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('Rectangle.php');

class Square extends Rectangle {
	function __construct($side = 0) {
		$this->width = $side;
		$this->height = $side;
	}
} //End of square class

$width = 21;
$height = 98;
echo "<h2>With a width of $width and a height of $height...</h2>";
$r = new Rectangle($width, $height);
echo '<p>The area of the rectangle is ' . $r->getArea() . '</p>';
echo '<p>The perimeter of the rectangle ' . $r->getPerimeter() . '</p>';

$side = 60;
echo "<h2>With each side being $side...</h2>";
$s = new Square($side);
echo '<p>The area of the square is ' . $s->getArea() . '</p>';
echo '<p>THe perimeter of the square is ' . $s->getPerimeter() . '</p>';

unset($r, $s);

?>
</body>
</html>