<?php

class ElectricEngine implements Engine {
    public function start() {
        echo "⚡ Electric engine started<br>";
    }

    public function stop() {
        echo "🔋 Electric engine stopped<br>";
    }
}