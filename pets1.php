<!doctype html>
	<html lang="en">
	<head>
		<meta charset="uft-8">
		<title>Pets</title>
		<link rel="stylesheet" href="style.css">
	</head>
<?php  
	class Pet {
		public $name;
		
		function __construct($pet_name) {
			$this->name = $pet_name;
		}
		
		function eat() {
			echo "<p>$this->name is eating.</p>";			
		}
		
		function sleep() {
			echo "<p>$this->name is sleeping.</p>";
		}
		
		function play() {
			echo "<p>$this->name is playing.</p>";
		}
	} //ends pet class
	
	class Cat extends Pet {
		function play() {
			echo "<p>$this->name is climbing.</p>";
		} //end of cat class.
		
	}
	
	
	class Dog extends Pet {
		function play() {
			echo "<p>$this->name is fetching.</p>";
		}
	}
	
	$dog = new Dog('Satchel');
	$cat = new Cat('Stupid');
	
	$pet = new Pet('Rob');
	
	//feed them
	$dog->eat();
	$cat->eat();
	$pet->eat();
	//Nap time
	$dog->sleep();
	$cat->sleep();
	$pet->sleep();
	// Let's play
	$dog->play();
	$cat->play();
	$pet->play();
	
	unset($dog, $cat, $pet);
	?>
	</body>
	</html>