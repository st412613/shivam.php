<?php

class Colony {

    private int $age;
    private boole $heavy ;
    private float $length;
    private string $color;
    private int $houseNumber;

    public function getAge():string
    {
        return "$this->age";
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setHouseNumber(int $age)
    {
        $this->houseNumber = $houseNumber;
    }

     public function getHouseNumber():string
    {
        return "$this->houseNumber";
    }
     public function getColor():string
    {
       return " $this->color";
    }

    public function setColor(int $color)
    {
        $this->color = $color;
    }

    public function getLength ()
    {
        return "$this->length";
    }
    public function setLength (float $length)
    {
        $this->length = $length;
    }

    public function getHeavy ()
    {
        return "$this->heavy";
    }

     public function setHeavy (bool $heavy)
    {
       $this->heavy = $heavy;
    }
}

 