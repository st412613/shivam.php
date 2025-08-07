<?php

class Pet {
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName():string
    {
        return "$this->name";
    }

}

$pet1 = new Pet('Mr.Fluffy');

print $pet1->getName(); 