<?php

require 'vendor/autoload.php';

use App\Product;

function testProduct(string $name, float $price)
{
    try {
        $product = new Product($name, $price);
        echo "Product created: " . $product->getName() . " - $" . $product->getPrice() . "\n";
    } catch (InvalidArgumentException $e) {
        echo "InvalidArgumentException: " . $e->getMessage() . "\n";
    } catch (Exception $e) {
        echo " General Exception: " . $e->getMessage() . "\n";
    }
}

// 🔹 Test cases
echo "=== Valid Product ===\n";
testProduct("Laptop", 999.99);

echo "\n=== Empty Name ===\n";
testProduct("", 500);

echo "\n=== Negative Price ===\n";
testProduct("Smartphone", -100);

echo "\n=== Price Over Limit ===\n";
testProduct("TV", 1500000);
