<?php

class Cat {
    public $name, $breed, $age;
}

$cat = new Cat();
$cat1 = $cat;
$cat1->name = "Mr. Fluffy";
$cat1->breed = 'long-haired mix';
$cat1->age = 2;

print "Cat1 object \n";
print $cat1->name;
print $cat1->breed;
print $cat1->age;
print "Cat object \n";
print $cat->name;
print $cat->breed;
print $cat->age;
