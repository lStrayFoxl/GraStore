<?php
    session_start();

    include("../../path.php");
    include("../database/db.php");
    include("controllers.php");
    include("../helps/validationImg.php");
    include("../helps/validationData.php");

    $errMsg = [];

    // Code form registration
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registr'])) {
        $user = new UserData($_POST);

        if($user->login === "" || $user->pass === "" || $user->pass2 === "") {
            echo("Не все поля заполнены!");
        }
        elseif($user->pass !== $user->pass2) {
            echo("Пароли не совпадают.");
        }
        else{
            $pass = password_hash($user->pass, PASSWORD_DEFAULT);

            $params = [
                "login" => $user->login,
                "password" => $pass,
                "admin" => 0
            ];

            UserControll::create("users", $params);
        }
    }

    // Code form enter
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enter'])) {
        $user = new UserData($_POST);

        if ($user->validation() === false) {
            $existence = selectOne('users', ['login' => $user->login]);
            
            if($existence == null) {
                echo("Пользователь не найден!");
            }
            else{
                if($existence && password_verify($user->pass, $existence['password'])) {
                    UserControll::AuthUser($existence);
                }else {
                    echo("Логин или пароль введены не верно!");
                }
            }
        }else {
            array_push($errMsg, $user->validation());
        }
    }

    // Code exit user
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['btnExit'])) {
        UserControll::unlogin();
    }   
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePhoto'])) {
        $id = $_SESSION['id'];

        if (!empty($_FILES['img']['name'])) {
            $imgUser = new UserImg($_FILES);

            if ($imgUser->validation() === false) {
                $imgUser->getServer() === false ? "" : array_push($errMsg, $imgUser->getServer());
                
                $user = [
                    "photo" => $_POST['img']
                ];

                UserControll::change("users", $id, $user);
            }else {
                array_push($errMsg, $imgUser->validation());
            }
                    
        }else{
            array_push($errMsg, "Ошибка получения картинки.");
        }
    }
