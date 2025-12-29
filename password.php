<?php
$username = 'imam';
$password = 178;
// to check the lenrh of paswowrd the strlen 
if (strlen($password ) > 8){
echo 'password is good';
}  elseif (strlen($password) > 6){
    echo 'ok its remaining small';
} else{
    echo "ls put password mordan 8 ok bro:" . $username;
}