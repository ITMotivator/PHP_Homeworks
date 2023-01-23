<?php

//Задание 1
$correctAnswer = 1380;

placeToReturn:
print("В каком году произошла Куликовская битва?
- 1342
- 1380
- 1410\n");

$userAnswer = (int) readline();

switch (true) {
    case $userAnswer === 1380:
        echo "Поздравляю, это правильный ответ!";
        break;
    case $userAnswer === 1342 || $userAnswer === 1410:
        echo "К сожалению, вы ответили не верно!";
        break;
    default:
        echo "Такого варианта нет в списке. Еще раз...\n";
        goto placeToReturn;
};