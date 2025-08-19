<?php
// Include or autoload all classes/interfaces
require_once 'Engine.php';       // interface
require_once 'PetrolEngine.php'; // class implementing Engine
require_once 'ElectricEngine.php';
require_once 'Car.php';          // class Car

// Use Petrol Engine
$petrol = new PetrolEngine();
$car1 = new Car($petrol);
$car1->drive();

echo "<hr>";

// Use Electric Engine
$electric = new ElectricEngine();
$car2 = new Car($electric);
$car2->drive();
?>
