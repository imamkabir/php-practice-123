<?php

interface SecurityCheck {
    public function showBadge();
}

class Human {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        echo "Human ($this->name): Hello.\n";
    }
}

trait Flashlight {
    public function beam() {
        echo "Flashlight: Lighting up the dark hallway...\n";
    }
}

trait LaserPointer {
    public function beam() {
        echo "Laser: Pointing at a specific target...\n";
    }
}

trait Taser {
    public function zap() {
        echo "Taser: ZZZZAP! Target neutralized.\n";
    }
}

class NightGuard extends Human implements SecurityCheck {
    
    use Flashlight, LaserPointer, Taser {
        Flashlight::beam insteadof LaserPointer;
        LaserPointer::beam as pointLaser;
    }

    public function showBadge() {
        echo "Guard: Here is my Badge ID #405.\n";
    }
}

// Execution
$imam = new NightGuard("Imam");

$imam->speak(); 
$imam->showBadge();

$imam->beam();       
$imam->pointLaser(); 
$imam->zap();        
?>