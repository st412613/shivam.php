<?php

require 'vendor/autoload.php';

use App\Application;
use App\EmptyStringException;

try {
    $app = new Application();
    $app->run();
} catch (EmptyStringException $e) {
    echo $e->getMessage();
} catch (InvalidArgumentException $e) {
    echo "Invalid price arguments: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Exception: " . $e->getMessage();
}
