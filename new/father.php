<?php
//  THE FATHER The Source of DNA
class Father {
    public $lastName = "garba";
    public $eyeColor = "Brown";

    public function sayHello() {
        echo "Hello, I am a garba family member.\n";
    }
}

//  THE SON (The Inheritor)
// extends Father means Give me ALL of Father's variables and functions
class Son extends Father {
    // It's empty
    // I don't need to write $lastName here. I already have it.
}

//  THE TEST
$boy = new Son();

// DOES HE HAVE THE NAME?
echo $boy->lastName; 
// Output garba
// IT WORKED He stole it from the Father class

// CAN HE SPEAK?
$boy->sayHello();
// Output: Hello, I am a garba family member
// IT WORKED! He used his Father's function