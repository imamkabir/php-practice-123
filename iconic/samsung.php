<?php
//  THE PARENT 
class SamsungDevice {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // This is the "Empty" command that everyone will share
    public function pressButton() {
        echo "Device is reacting...\n";
    }
}

// 2. THE CHILDREN 

class GalaxyPhone extends SamsungDevice {
    // POLYMORPHISM: We write the function AGAIN to change the action
    public function pressButton() {
        echo "{$this->name}: Screen turns on. Scanning Face ID...\n";
    }
}

class GalaxyWatch extends SamsungDevice {
    // POLYMORPHISM: We write the function AGAIN for the watch
    public function pressButton() {
        echo "{$this->name}: Vibrate! Showing Heart Rate...\n";
    }
}

class GalaxyBuds extends SamsungDevice {
    // POLYMORPHISM: Buds don't have screens, so they do this:
    public function pressButton() {
        echo "{$this->name}: Playing Music... Active Noise Cancelling ON.\n";
    }
}

// 

// We have a collection of different Samsung items
$myGear = [
    new GalaxyPhone("Galaxy S26 Ultra"),
    new GalaxyWatch("Watch 6 Classic"),
    new GalaxyBuds("Buds 4 Pro")
];

echo "--- TESTING MY SAMSUNG GEAR ---\n";

foreach ($myGear as $item) {
    // This is Polymorphism in action!
    // I just say "pressButton()" and I don't care which device it is.
    // The device itself knows what to do.
    $item->pressButton();
}

?>