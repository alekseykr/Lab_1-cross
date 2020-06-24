<?php
session_start();
include "../database/db.php";
include "../classes/class_user_role.php";

$login = $_POST['login'];
$password = $_POST['password'];
$isAuth = false;

if (!empty($login) && !empty($password)) {
    foreach ($users as $user) {
        if ($login == $user['login'] && $password == $user['password']) {
            $isAuth = true;
            switch ($user['role']) {
                case '3': {
                        $user = new Admin($user['name'], $user['surname'],$user['lang']);
                        break;
                    }
                case '2': {
                        $user = new Manager($user['name'], $user['surname'],$user['lang']);
                        break;
                    }
                case '1': {
                        $user = new Client($user['name'], $user['surname'],$user['lang']);
                        break;
                    }
            }
            $user->welcome();
        }
    }
    if (!$isAuth) {
        $_SESSION['message'] = "Вы ввели неверный логин или пароль";
        header("location: http://lab1/auth/login.php");
    }
} else {
    $_SESSION['message'] = "Вы ввели неверный логин или пароль";
    header("location: http://lab1/auth/login.php");
}
