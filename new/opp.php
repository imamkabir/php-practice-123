<?php
class Ghost {
    public $name;

    // 1. MAGIC: Runs when created
    public function __construct($n) {
        $this->name = $n;
        echo "BORN: A ghost named $this->name appeared!\n";
    }

    // 2. CUSTOM: Runs ONLY when I ask
    public function scare() {
        echo "$this->name says: BOOOO!\n";
    }

    // 3. MAGIC: Runs when I echo the object
    public function __toString() {
        return "This is a ghost object named $this->name";
    }

    // 4. MAGIC: Runs when the script ends
    public function __destruct() {
        echo "DIED: $this->name faded away...\n";
    }
}

// --- THE SCRIPT ---

echo "--- Start of Script ---\n";

// __construct runs AUTOMATICALLY here
$g = new Ghost("Casper"); 

// Custom function: I have to call this manually
$g->scare(); 

// __toString runs AUTOMATICALLY here because I tried to echo $g
echo $g . "\n";

echo "--- End of Script ---\n";
// __destruct runs AUTOMATICALLY here because the script is over