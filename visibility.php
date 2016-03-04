<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Visibility</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
class Test {
	public $public = 'public';
	protected $protected = 'protected';
	private $_private = 'private';
	
	function printVar($var) {
		echo "<p>In Test, \$$var:
		'{$this->$var}'.</p>";
	}
}

class LittleTest extends Test {
	function printVar($var) {
		echo "<p>In LittleTest, \$$var: '{$this->$var}'.</p>";
	}
}

$parent = new Test();
$child = new LittleTest();

echo '<h1>Public</h1>';
echo '<h2>Initially...</h2>';
$parent->printVar('public');
$child->printVar('public');

echo '<h2>Modifying $parent->public...</h2>';
$parent->private = 'modified';
$parent->printVar('public');
$child->printVar('public');
?>
</body>
</html>