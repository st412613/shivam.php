<?php
// ----------------------Question-1--------------------------------
// require_once __DIR__ . "/computer_system_1.php";


// $product1 = new Product("@#$@#",10.5, "Dell-3035-thinkbook", "8 gb ram, 500 hard disk", 3.4, 20 );
// $product1_details = $product1->get_products_details();
// print $product1_details;


// ----------------------Question-2--------------------------------

require_once __DIR__ . "/computer_system_restrict_access_2.php";
$product1 = new Product();
$product1->set_name("Lenevo"); // we can only access private properties within the classs
print $product1->get_name();
// print $product1->name ; // It give fatal error Can not access private property
$product1->price = 50;
print $product1->price; // It is puclic variable so it can acces out side of the class