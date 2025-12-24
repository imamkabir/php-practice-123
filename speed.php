<?php
$speed = 0;
if($speed === 0){
    echo 'Parked';
} elseif($speed > 120){
    echo 'SLOW DOWN! Too Fast';
} elseif($speed > 60){
    echo 'Cruising Speed. Good';
} else{
    echo 'Too slow. Speed up';
}