<?php
    session_start();

    include("../../path.php");
    include("../database/db.php");

    $errMsg = [];

    // Function user enter
    function AuthUser($array) {
        $_SESSION['id'] = $array['id'];
        $_SESSION['login'] = $array['login'];
        $_SESSION['admin'] = $array['admin'];
    
        if($_SESSION['admin']){
            header('location: ' . BASE_URL . '/app/admin/store/index.php');
        }else {
            header('location: ' . BASE_URL);
        }
    }

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
                    AuthUser($existence);
                }else {
                    echo("Логин или пароль введены не верно!");
                }
            }
            
        }
    }

    // Code exit user
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['btnExit'])) {
        // сбросить все переменные сессии
        $_SESSION = array();

        // сбросить куки, к которой привязана сессия
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // уничтожить сессию
        session_destroy();

        header('location: ' . BASE_URL);
    }   

    print_r($_SESSION);
    print_r($_FILES);
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePhoto'])) {
        $id = $_SESSION['id'];

        if (!empty($_FILES['img']['name'])) {
            $imgName = time() . "_" .  $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileType = $_FILES['img']['type'];
            $destination = ROOT_PATH . "\assets\img\avatar\\" . $imgName;
            
            if (strpos($fileType, 'image') === false) {
                array_push($errMsg, "Подгружаемый файл не является изображением!");
        
            }elseif($_FILES['img']['size'] > (1000 * 1024)){
                array_push($errMsg, "Размер загружаймого файла не может превышать 500КБ.");
        
            }elseif(getimagesize($fileTmpName)[0] > 1600 || getimagesize($fileTmpName)[1] > 1000){
                array_push($errMsg, "Разрешение загружаймого изображения не может превышать 1600*1000.");
        
            }else{
                $result = move_uploaded_file($fileTmpName, $destination);
        
                if ($result) {
                    $_POST['img'] = $imgName;
                }else{
                    array_push($errMsg, "Ошибка загрузки изображения на сервер.");
                }

                $user = [
                    "photo" => $_POST['img'],
                ];
    
                $id = update("users", $id, $user);
                header('location: ' . BASE_URL . "/pages/profile.php");
            }
        
        }else{
            array_push($errMsg, "Ошибка получения картинки.");
        }

    }
