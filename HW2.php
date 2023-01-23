<?php

//Задание 1
// $correctAnswer = 1380;

// placeToReturn:
// print("В каком году произошла Куликовская битва?
// - 1342
// - 1380
// - 1410\n");

// $userAnswer = (int) readline();

// switch (true) {
//     case $userAnswer === 1380:
//         echo "Поздравляю, это правильный ответ!";
//         break;
//     case $userAnswer === 1342 || $userAnswer === 1410:
//         echo "К сожалению, вы ответили не верно!";
//         break;
//     default:
//         echo "Такого варианта нет в списке. Еще раз...\n";
//         goto placeToReturn;
// };

//Задание 2
$tasksNumber = readline("Сколько дел запланировано на сегодня?\n");
while (!((int) $tasksNumber > 0 || $tasksNumber === '0')) {
    echo "Введите корректное значение\n";
    $tasksNumber = readline("Сколько дел запланировано на сегодня?\n");
}

if ($tasksNumber === '0') {
    echo "Сегодня вы полностью свободны!";
} else {
    (int) $tasksNumber;
    $finalMessage = "Cегодня у вас запланировано задач на день: {$tasksNumber}\n";
    $totalDuration = 0;
    $taskDuration;
    $task;

    for ($i = 1; $i <= $tasksNumber; $i++) {
        $task = readline("Задача №$i?\n");
        $taskDuration = (int) readline("Сколько примерно времени займет эта задача?\n");
        $totalDuration += $taskDuration;
        $finalMessage .= "- $task(${taskDuration}ч)\n";
    }
    $finalMessage .= "Примерное время выполнения плана = {$totalDuration}ч.";
    print($finalMessage);
}