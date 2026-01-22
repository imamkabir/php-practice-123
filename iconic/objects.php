<?php

/**
 * THE BLUEPRINT (The Class)
 * This is just the idea. It takes up almost no space in memory.
 */
class IronManSuit 
{
    // These are Properties (The Data/Information)
    public string $model;
    public int $powerLevel;
    public bool $isFlying = false;

    // THE CONSTRUCT: Runs the moment the suit is "Built" (Instantiated)
    public function __construct(string $modelName, int $initialPower) 
    {
        $this->model = $modelName;
        $this->powerLevel = $initialPower;
        echo "--- Building Suit: {$this->model} ---\n";
    }

    // THE ACTIONS (The Methods)
    public function toggleFlight() 
    {
        $this->isFlying = !$this->isFlying; // Switches true to false or false to true
        $status = $this->isFlying ? "is now AIRBORNE" : "has LANDED";
        echo "{$this->model} $status.\n";
    }

    // THE MAGIC METHOD: This handles the "Complex Object" problem
    // It tells PHP how to turn this machine into a simple string.
    public function __toString() 
    {
        return "Suit Status: [Model: {$this->model} | Power: {$this->powerLevel}%]";
    }
}

// --- CREATING THE OBJECTS (The Real Things) ---

// 1. Build the first suit (Object #1)
$mark5 = new IronManSuit("Mark V (Suitcase)", 45);

// 2. Build a second suit (Object #2)
// Even though it uses the same Blueprint, it is a different "Individual" in memory.
$mark85 = new IronManSuit("Mark LXXXV (Nanotech)", 100);

echo "\n--- STARTING OPERATION ---\n";

// Use the first object
$mark5->toggleFlight();

// Use the second object (Notice it doesn't affect the first one!)
$mark85->powerLevel = 98; 

echo "\n--- PRINTING THE OBJECTS ---\n";

// Normally 'echo' would crash on an object. 
// But because we have __toString(), it works!
echo $mark5 . "\n";
echo $mark85 . "\n";

?>