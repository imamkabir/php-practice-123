<?php
$fruits = ['appee', 'orange', 'banaa'];
// get lenth of an array 
echo count($fruits);
// search arrayy for sometig specific 
var_dump(in_array('appee' , $fruits));
// add to an array 
$fruits[] = 'real apple';
print_r($fruits);


// array push
array_push($fruits, 'bana32');
// add to the beagrning 
array_unshift($fruits, 'banaereeeeeeeeeee');
// remve from array 
