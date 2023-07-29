<?php
    include("../../path.php");
    include("../database/db.php");

    // Code form registration
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registr'])) {
        $login = trim($_POST["login"]);
        $pass1 = trim($_POST["password1"]);
        $pass2 = trim($_POST["password2"]);

        if($login === "" || $pass1 === "" || $pass2 === "") {
            echo("Не все поля заполнены!");
        }
        elseif($pass1 !== $pass2) {
            echo("Пароли не совпадают.");
        }
        else{
            $pass = password_hash($pass1, PASSWORD_DEFAULT);

            $params = [
                "login" => $login,
                "password" => $pass,
                "admin" => 0
            ];

            insert("users", $params);
            header('location: ' . BASE_URL);
        }
    }

    // Code form enter
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enter'])) {
        $login = trim($_POST["login"]);
        $pass = trim($_POST["password"]);

        if($login === "" || $pass === "") {
            echo("Не все поля заполнены!");
        }
        else{
            $existence = selectOne('users', ['login' => $login]);
            
            if($existence == null) {
                echo("Пользователь не найден!");
            }
            else{
                if($existence && password_verify($pass, $existence['password'])) {
                    echo("Вошёл");
                }else {
                    echo("Почта или пароль введены не верно!");
                }
            }
            
        }
    }
