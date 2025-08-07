<?php
// It gives fatal error 

final class Spread {
    protected string $productName;
    protected float $weight;
    public int $shelfLifeMonths;

    public function getProductName(): string {
        return $this->productName;
    }

    public function getWeight(): float {
        return $this->weight;
    }
}

class Jam extends Spread {
    public int $sweetness;

    public function __construct(string $productName, float $weight)
    {
       $this->productName = $productName;
        $this->weight = $weight;
    }

    public function __toString(): string {
        return "JAM: {$this->productName} ({$this->weight}g) keeps for {$this->shelfLifeMonths} months. Sweetness: {$this->sweetness}";
    }
}

class Honey extends Spread {
    public bool $isManuka = false;

    public function __construct(string $productName, float $weight)
    {
         $this->productName = $productName;
        $this->weight = $weight;
    }

    public function __toString(): string {
        $manuka = $this->isManuka ? "Manuka" : "NOT Manuka";
        return "HONEY: {$this->productName} ({$this->weight}g) keeps for {$this->shelfLifeMonths} months ({$manuka})";
    }
}

$food1 = new Honey("Clear Honey", 90.0);
$food1->shelfLifeMonths = 60;

print $food1;
