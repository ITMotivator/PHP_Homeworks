<?php
/*Подготовьте два массива одинаковой размерности, но не менее 10 элементов, 
с произвольными числовыми значениями. Разработайте скрипт для запуска из 
командной строки, выполняющий перемножение элементов двух массивов и выводящий 
результат в консоль с помощью print_r. Умножение должно выполняться только между 
элементами соответствующих индексов, то есть нулевой элемент первого массива 
умножается на нулевой элемент второго массива;*/

$array1 = [];
$array2 = [];
$arrayResulted = [];
$arrLength = 12;

for ($i=0; $i < $arrLength; $i++) {
    $array1[$i] = rand(1, 9);
    $array2[$i] = rand(1, 9);
    $arrayResulted[$i] = $array1[$i] * $array2[$i];
}

print_r($array1);
print_r($array2);
print_r($arrayResulted);

?>