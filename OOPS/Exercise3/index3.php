<?php

abstract class Vehicle {
     protected int $numDoor;
     protected string $fuel;

     public function __construct(int $numDoor, string $fuel)
     {
        $this->numDoor = $numDoor;
        $this->fuel = $fuel;
     }
}

class Car extends Vehicle {
    private int $numSeats;
    private float $roadTax;

    public function __construct(int $numDoor, string $fuel, int $numSeats, float $roadTax){
          parent::__construct($numDoor, $fuel);
          $this->numSeats = $numSeats;
          $this->roadtax = $roadTax;
    }

    public function __toString()
    {
        return "$this->numDoor $this->fuel $this->roadtax  $this->numSeats";
    }
}

class Van extends Vehicle {
    private bool $commercialTax;

    public function __construct(int $numDoor, string $fuel, bool $commercialTax)
    {
          parent::__construct($numDoor, $fuel);
          $this->commercialTax = $commercialTax;
    }

    public function __toString()
    {
        return "$this->numDoor $this->fuel $this->commercialTax";
    }
}


$car = new Car(5, "20L", 7, 20.4);
$van = new Van(6, "10L", 12, 35.6);

print $car;
print "\n";
print $van;