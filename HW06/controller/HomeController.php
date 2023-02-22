<?php

$pageHeader = 'Добро пожаловать';

$username = null;
if (isset($_SESSION['user'])) {
   $username = $_SESSION['user']->getUsername();
}



require_once 'view/home.php';