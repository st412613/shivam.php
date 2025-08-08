<?php

require_once __DIR__ . "/../vendor/autoload.php";
use Shiva\Product;

$product1 = new Product();
$product1->setId(7);
$product1->setDescription("hammer");
$product1->setPrice(9.99);

var_dump($product1);