<?php
$arr1 = [1,2,3];
$arr2 = [4,5,5];
$arr3 = array_merge($arr1, $arr2);

// its simple mergere
// spread opratore look
$arr4 = [...$arr1, ...$arr2,];
print_r($arr4);
/// basicly thsese arr3 and arr4 are doing the same thing ok nothing new 