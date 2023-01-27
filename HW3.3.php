<?php

$students = [
    'ИТ20' => [
        'Иванов Иван' => 5,
        'Кириллов Кирилл' => 3.7,
        'Семенов Семен' => 4.2,
        'Кравцова Елена' => 2.9,
        'Крупянский Игорь' => 2.7,
        'Круглая Инна' => 4.6,
    ],
    'БАП10' => [
        'Антонов Антон' => 4.4,
        'Петрова Анна' => 2.9,
        'Краснов Павел' => 4.1,
        'Милютина Регина' => 5,
        'Старостин Влад' => 3.2,
        'Кузнецова Светлана' => 4.6,
        'Никифоров Андрей' => 4.7,
    ],
    'ВП41' => [
        'Иванова Наталья' => 4.1,
        'Петров Семен' => 3.0,
        'Семенова Ирина' => 4.5,
        'Сафронов Святослав' => 5,
        'Петренко Андрей' => 3.1,
        'Аджимамбетов Ришат' => 4.7,
        'Осадчая Алла' => 4.0,
        'Абрамян Карен' => 4.1,
    ],
];

$studentsToSendDown = [];
$maxAverageGrade = 0;
$avgGrade = 0;
$bestGroup = '';

foreach ($students as $groupName => $group) {
    $sumGrades = 0;
    foreach ($group as $studentName => $studentGrade) {
        $sumGrades += $studentGrade;
        if ($studentGrade < 3) {
            $studentsToSendDown[$groupName][] = $studentName;
        }
    }
    $avgGrade = $sumGrades / count($group);
    print ("$groupName: " . round($avgGrade, 2) . "\n");
    if ($avgGrade > $maxAverageGrade) {
        $maxAverageGrade = round($avgGrade, 2);
        $bestGroup = $groupName;
    }
}
print("Лучшая группа по успеваемости: $bestGroup - $maxAverageGrade\n");
print("Студенты к отчислению:\n");
print_r($studentsToSendDown);

?>