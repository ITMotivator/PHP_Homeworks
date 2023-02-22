<?php
/* @var $pageHeader string */
/* @var $username ?string */

?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>

<body>

    <?php if (isset($username)): ?>
        <h1>
            <?="{$pageHeader} " . "{$username}!" ?>
        </h1>
        <button><a href="?controller=security&action=logout">Выйти</a></button>
        <button><a href="?controller=task">Задачи</a></button>
    <?php else: ?>
        <h1>
            <?= $pageHeader ?>
        </h1>
        <button><a href="?controller=security&action=signin">Войти</a></button>
    <?php endif; ?>
</body>

</html>