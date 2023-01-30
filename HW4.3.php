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

$res = false;
function checkIfIn(string $item, $arr): bool
{
    global $res;
    if (!is_array($arr)) {
        if ($arr === $item) {
            $res = true;
            return $res;
        }
    } else {
        foreach ($arr as $nextArr) {
            checkIfIn($item, $nextArr);
        }
    }
    return $res;
}


$result = checkIfIn("Ноутбук", $box);
var_dump($result);

?>