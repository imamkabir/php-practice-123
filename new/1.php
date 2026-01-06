<?php
// Anonymous function to double a number 
//$double is the anonymous function now tell me what it does
// we said n * 2 then what is n
$double = function($n) { return $n * 2; };
// n = to 5 because the $double is called with 5
echo $double(5);
// so our answer is 10 because 5 * 2 = 10