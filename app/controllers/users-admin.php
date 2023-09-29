<?php
    include("../../database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $login = "";
    $pass = "";

    // Код создания пользователя
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddUser'])) {

        // include("../../app/helps/validationImage.php");

        $login = trim($_POST["login"]);
        $pass = trim($_POST["password"]);
        $admin = isset($_POST['admin']) ? 1 : 0;

        if ($login === '' || $pass === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($login, 'UTF8') <= 2) {
            array_push($errMsg, "Логин должно быть больше 2-ми символов.");
        }else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $user = [
                "login" => $login,
                "password" => $pass,
                "admin" => $admin,
                "photo" => "тут тип путь"
            ];

            $id = insert("users", $user);
            $topic = selectOne("users", ['id' => $id]);
            header('location: ' . 'index.php');
        }

    }

    // Код удаление пользователя
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        delete("users", $id);
        header('location: ' . 'index.php');

    }

    // Код изменение данных магазина
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $user = selectOne("users", ['id' => $id]);

        $login = $user['login'];
        $pass = $user['password'];
        $admin = $user['admin'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeUser'])) {

        $id = trim($_POST["id"]);
        $login = trim($_POST["login"]);
        $pass1 = trim($_POST["password1"]);
        $pass2 = trim($_POST["password2"]);
        $admin = isset($_POST['admin']) ? 1 : 0;

        if ($login === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($login, 'UTF8') <= 2) {
            array_push($errMsg, "Название должно быть больше 2-ми символов.");
        }elseif ($pass1 !== "" && $pass2 !== "") {
            if($pass1 === $pass2) {
                $pass1 = password_hash($pass1, PASSWORD_DEFAULT);

                $user = [
                    "login" => $login,
                    "password" => $pass1,
                    "admin" => $admin,
                    "photo" => "тут тип путь"
                ];

                $id = update("users", $id, $user);
                header('location: ' . 'index.php');
            }else {
                array_push($errMsg, "Пароли не совпадают.");
            }
        }else {
            $user = [
                "login" => $login,
                "admin" => $admin,
                "photo" => "тут тип путь"
            ];

            $id = update("users", $id, $user);
            header('location: ' . 'index.php');
        }

    }
