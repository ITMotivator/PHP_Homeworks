<?php

$arr = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
function getMaxMinAvg(array $array): array
{
    $arrRes = [];
    $min = min($array);
    $max = max($array);
    $sum = array_sum($array);
    $avg = round($sum / count($array), 2);
    return $arrRes = ['max' => $max, 'min' => $min, 'average' => $avg];
}

$result = getMaxMinAvg($arr);
print_r($result);

?>