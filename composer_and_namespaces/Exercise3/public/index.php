<?php
require_once __DIR__ . "/../vendor/autoload.php";

$faker = Mattsmithdev\FakerSmallEnglish\Factory::create();

for($i = 0; $i < 10; $i++){
    echo "$i \n";
    echo $faker->name();
    echo "\n";
}

// generate data by accessing properties
// echo $faker->name();
  // 'Lucy Cechtelar';
// echo $faker->address();
  // "426 Jordy Lodge
  // Cartwrightshire, SC 88120-6700"
// echo $faker->text();
  // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
  // et sit et mollitia sed.
  // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
  // sit minima sint.