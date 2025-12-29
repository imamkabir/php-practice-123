<?php
$money = 0;
switch($money){
    case 1: 
        echo 'paid';
        break;
        case 2:
            case 3:
            echo 'not paid';
            break;
            case 0:
                echo 'payment declined';

}
echo '<br/>' ;
 $payment =  match($money){
    1 => 'paid',
    2,3 => 'not paid',
    0 => 'get out of here men ', 
};
echo $payment;