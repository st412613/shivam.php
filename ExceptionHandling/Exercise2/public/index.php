<?php

require 'vendor/autoload.php';

use App\Application;

try{
    $app = new Application();
$app->run();
}catch(InvalidArgumentException $e){
    echo " Invalid price arguments";
}catch (Exception $e) {
        echo " General Exception: " . $e->getMessage() . "\n";
    }

