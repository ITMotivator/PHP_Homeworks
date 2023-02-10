<?php
require_once 'model/UserProvider.php';

if (isset($_SESSION['user'])){
    header('Location: /');
}

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    $user = UserProvider::getByUsernameAndPassword($username, $password);

    if (is_null($user)) {
        $error = 'Пользователь с указанными учетными данными не найден';
    }else{
        $_SESSION['user'] = $user;
    }
}


require_once 'view/signin.php';
