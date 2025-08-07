<?php
require_once __DIR__ . "/library.php";
require_once __DIR__ . "/book.php";
require_once __DIR__ . "/dvd.php";

$agni = new Book("Agni", "A.P.J Kalam", 2011, 1, 1000, "This is a missile book" );
$biography = new Dvd("Subhhas Chandra Bose", "Shivam", "2025", 2, 220, "Hindi");
print "This is for book -";
print_r($agni->generalDescription());
print "This is for dvd -";
print_r($biography->generalDescription());
print "This is for book duration -";
print_r($agni->getDuration());
print "This is for dvd duration -";
print_r($biography->getDuration());
