<?php

$arr = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
function getMaxMinAvg(array $array): array
{
    $arrRes = [];
    $min = $array[0];
    $max = $array[0];
    $sum = 0;
    foreach ($array as $value) {
        if ($value < $min)
            $min = $value;
        if ($value > $max)
            $max = $value;
        $sum += $value;
    }
    $avg = round($sum / count($array), 2);
    return $arrRes = ['max' => $max, 'min' => $min, 'average' => $avg];
}

$result = getMaxMinAvg($arr);
print_r($result);

?>