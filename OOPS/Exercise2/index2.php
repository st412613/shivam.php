<?php

class Pet {
    private string $name;

    public function getName():string
    {
        return "$this->name";
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}

$pet1 = new Pet();
$pet1->setName("Fifi");

print $pet1->getName(); 