<?php
// simple array
$numbers = [1,44,55,22];
$fruits = ['appee', 'orange', 'banaa'];
//var_dump($numbers);
//echo $fruits[2];
// asociative array
$clores = [
    1 => 'red',
    4 => 'blue',
    6 => 'green',
];
//echo $clores[4];
//$hex = [
  //  'red' => '#f00',
    //'blue' => '#0f0',
//];//
//echo $hex['red'];
$person = [
    'name' => 'imam',
    'age' => '21',
    'email' => 'imamkabir497@gmail.com,'


];
//echo $person ['name'];
$people = [
    [
    'name' => 'musa',
    'age' => '22',
    'email' => 'imamkabir497@gmail.com,'


    ],
    [
    'name' => 'imams',
    'age' => '23',
    'email' => 'imamkabir497@gmail.com,'


    ],
    [
    'name' => 'imam3',
    'age' => '241',
    'email' => 'imamkabir497@gmail.com,'


    ],

];
//echo $people[1]['email'];
var_dump(json_encode($people));