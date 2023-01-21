<?php

$userName = readline("Здравствуйте! Как вас зовут?\n");
$userAge = readline("Сколько вам лет?\n");
print("Вас зовут: $userName, ваш возраст: $userAge.") . PHP_EOL;

$task1 = readline("Какая задача стоит перед вами сегодня?\n");
$task1Duration = readline("Сколько примерно времени эта задача займет?\n");

$task2 = readline("Какая еще задача стоит перед вами сегодня?\n");
$task2Duration = readline("Сколько примерно времени эта задача займет?\n");

$task3 = readline("Какая еще задача стоит перед вами сегодня?\n");
$task3Duration = readline("Сколько примерно времени эта задача займет?\n");

print("$userName сегодня у вас запланировано 3 приоритетных задачи на день:
- $task1(${task1Duration}ч)
- $task2(${task2Duration}ч)
- $task3(${task3Duration}ч)");