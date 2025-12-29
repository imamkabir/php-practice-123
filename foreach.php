<?php
/*
so basicly this loop is mostly ofr arreys nd stuff etc you get wat i mean 
*/
/*OST = ['first post', 'second post', 'third post', ];
foreach ($POST as $itm){
    echo $itm;
}
    */
$person = [
    'name' => 'imam',
    'age' => '21',
    'email' => 'imamkabir497@gmail.com,'
];
foreach($person as $key => $value){
    echo $key - $value;
}
