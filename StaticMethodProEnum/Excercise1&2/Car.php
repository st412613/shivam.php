<?php

class Car {
    public $make, $model, $price ;
    private static $totalPrice = 0;
    private static $numInstances = 0;

    public function __construct($make, $model, $price)
    {  
       $this->setMake($make);
       $this->setModel($model);
       $this->setPrice($price);
       self::$totalPrice += $price;
       self::$numInstances += 1;  
    }

    public static function averagePrice(){
        return self::$totalPrice / self::$numInstances;
    }

    public function setMake(string $make):void
    {
        $this->make = $make;
    }

     public function setModel(string $model):void
    {
        $this->model = $model;
    }

     public function setprice(float $price):void
    {
        $this->price = $price;
    }

     public function getMake():string
    {
        return $this->make;
    }

      public function getModel():string
    {
        return $this->model;
    }

      public function getPrice():float
    {
        return $this->price;
    }
}

$car1 = new Car("Ford", "1015", 20);
$car2 = new Car("Ford", "1015", 20);
$car3 = new Car("Ford", "1015", 50);
$car4 = new Car("Ford", "1015", 20);

echo Car::averagePrice();