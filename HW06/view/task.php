<?php
/* @var $tasks array */
?>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        .task {
            display: flex;
            justify-content: space-between;
            background-color: antiquewhite;
            margin-bottom: 20px;
            margin-top: 10px;
            padding: 10px;
            width: 500px;

        }

        .cell {
            border: 1px solid black;
            margin-right: 50px;
            padding: 5px;
        }

        .descr {
            width: 150px;
        }

        .btn {
            background-color: azure;
            border-radius: 5%;
            padding: 5px 10px;
        }

        .green {
            background-color: greenyellow;
        }

        .red {
            background-color: lightcoral;
        }

        .hidden {
            visibility: hidden;
        }
    </style>
    <title>Задачи</title>
</head>

<body>
    <h2>Ваши задачи:</h2>
    <div>

    </div>
    <form action="?controller=task&action=add" method="post">
        <input type="text" name="description" placeholder="Описание задачи">
        <button type="submit">Добавить</button>
    </form>
    <button><a href="?controller=task&action=all">Все задачи</a></button>
    <button><a href="?controller=task&action=done">Выполненные</a></button>
    <button><a href="?controller=task&action=active">В работе</a></button>
    <button><a href="?controller=task&action=clear">Очистить список</a></button>

    <?php
    if (!is_null($tasks)) {
        if ($_GET['action'] === 'all' || $_GET['action'] === 'add' || $_GET['action'] === 'setDone') {
            foreach ($tasks as $key => $task): ?>
                <?php if ($task->isDone()): ?>
                    <div class="task">
                        <div class='cell descr'>
                            <?= $task->getDescription() ?>
                        </div>
                        <div class='cell green'>
                            выполнена
                        </div>
                        <div class='cell hidden'>Готово</div>
                    </div>
                <?php else: ?>
                    <div class="task">
                        <div class='cell descr'>
                            <?= $task->getDescription() ?>
                        </div>
                        <div class='cell red'>
                            в работе
                        </div>
                        <div class='cell btn'><a href="?controller=task&action=setDone&id=<?= $key ?>">Готово</a></div>
                    </div>
                <?php endif; ?>
            <?php endforeach;
        } elseif ($_GET['action'] === 'active') {
            foreach ($tasks as $key => $task): ?>
                <?php if (!$task->isDone()): ?>
                    <div class="task">
                        <div class='cell descr'>
                            <?= $task->getDescription() ?>
                        </div>
                        <div class='cell red'>
                            в работе
                        </div>
                        <div class='cell btn'><a href="?controller=task&action=setDone&id=<?= $key ?>">Готово</a></div>
                    </div>
                <?php endif; ?>
            <?php endforeach;
        } elseif ($_GET['action'] === 'done') {
            foreach ($tasks as $key => $task): ?>
                <?php if ($task->isDone()): ?>
                    <div class="task">
                        <div class='cell descr'>
                            <?= $task->getDescription() ?>
                        </div>
                        <div class='cell green'>
                            выполнена
                        </div>
                        <div class='cell hidden'>Готово</div>
                    </div>
                <?php endif; ?>
            <?php endforeach;
        }
    }

    ?>
</body>

</html>