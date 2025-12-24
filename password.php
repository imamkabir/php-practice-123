<?php
$username = 'imam';
$password = 178;
if (strlen($password ) > 8){
echo 'password is good';
}  elseif (strlen($password) > 6){
    echo 'ok its remaining small';
} else{
    echo "ls put password mordan 8 ok bro:" . $username;
}