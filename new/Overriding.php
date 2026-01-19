<?php
// 1. THE FATHER  uncle mudasir Old School 
class Father {
    public function drive() {
        echo "Father: I am driving carefully at 40km/h.\n";
    }
}

// 2. THE SON (The Rebel)
// extends menas Give me ALL of Father's variables and functions
class Son extends Father {
    // HELLO! I am writing the function AGAIN.
    // Because I write it here, PHP will use MINE, not my Dad's
    public function drive() {
        echo "Son: I am drifting at 150km/h! Vroom!\n";
    }
}

//  TEST 

$dad = new Father();
$dad->drive(); 


$boy = new Son();
$boy->drive(); 
