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
                        $admin = new Admin($user['name'], $user['surname']);
                        $admin->adminwelcome();
                        break;
                    }
                case '2': {
                        $manager = new Manager($user['name'], $user['surname']);
                        $manager->managerwelcome();
                        break;
                    }
                case '1': {
                        $client = new Client($user['name'], $user['surname']);
                        $client->clientwelcome();
                        break;
                    }
            }
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
