<?php

class Jam {
    private string $productName;
    private float $weight;

    public int $shelfLifeMonths = 12;
    public int $sweetness;

    public function __construct(string $productName, float $weight)
    {
        $this->productName = $productName;
        $this->weight = $weight;
    }
    public function getProductName()
    {
        return "$this->productName";
    }

      public function getWeight()
    {
        return "$this->weight";
    }

    public function __toString(){
        return "JAM: $this->productName ($this->weight) keeps for $this->shelfLifeMonths months: sweetness $this->sweetness";
    }
}

$food1 = new Jam("Raspberry Conserve", 45.5);
$food1->shelfLifeMonths = 24;
$food1->sweetness = 5;

print $food1;