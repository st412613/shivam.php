<?php
class Car {
    private Engine $engine;

    // Dependency Injection via constructor
    public function __construct(Engine $engine) {
        $this->engine = $engine;
    }

    public function drive() {
        $this->engine->start();
        echo "Car is driving...<br>";
        $this->engine->stop();
    }
}
?>
