<?php
function sum($n1 = 5, $n2 = 5){
    return $n1 + $n2;
}
$multiply = fn($n1, $n2) => $n1 + $n2;
// this is just a shorter way of doing it @foreach.php 
//echo $multiply(9 , 9);
function sum2($n1, $n2){
    
}
$multiply = fn($n1, $n2) => $n1 * $n2;
echo $multiply(40, 23);
// what we did here is we creyed a fuction anfd then we called it in a short nd easy waqy to undestand 
// this is  an arrow function we might have sckioed and anonymus function but i like things short and easy and sweet to unestand 