<?php

$box = [
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
            'Настольная игра',
            'Настольная игра',
        ],
        4 => [
            [
                'Ноутбук',
                'Зарядное устройство'
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина'
                ]
            ],
            [
                'Инструкция',
                [
                    'Ключ'
                ]
            ]
        ]
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга'
        ]
    ]
];

function checkIfIn(string $item, $arr): bool
{
    foreach ($arr as $internalArr)
        if (is_array($internalArr)) {
            if (checkIfIn($item, $internalArr) === true) {
                return true;
            }
        } else {
            if ($internalArr === $item) {
                return true;
            }
        }
    return false;
}


$result = checkIfIn('Книга', $box);
var_dump($result);

?>