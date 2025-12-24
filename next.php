<?php
$temp = 40;
if($temp > 30){
echo 't is too hot! AC ON';
} elseif($temp < 15){
    echo 'It is freezing! Heater ON';
} else {
    echo 'Temperature is perfect. System OFF.';
}