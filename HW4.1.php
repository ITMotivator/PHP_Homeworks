<?php

$array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$arrStr = [];

$arrStr = array_map(function ($item) {
    return $item % 2 == 0 ? 'четное' : 'нечетное';
}, $array);
print_r($arrStr);


?>