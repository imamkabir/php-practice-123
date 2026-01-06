<?php
// This thingy here, it's kinda like magic juice, it takes a number and whispers to it
//$double is the secret spell container now
$double = function($n) { 
    //  n is like the chosen apple from the tree, multiply its soul by 2
    return $n * 2; 
};

//  Pick the apple, give it the magic number 5, let the spell do the thing
echo $double(5); // Output? The enchanted fruit becomes 10
