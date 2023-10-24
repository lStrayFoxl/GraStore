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

                    $pass = password_hash($pass, PASSWORD_DEFAULT);

                    $user = [
                        "login" => $login,
                        "password" => $pass,
                        "admin" => $admin,
                        "photo" => $_POST['img']
                    ];
        
                    $id = insert("users", $user);
                    $topic = selectOne("users", ['id' => $id]);
                    header('location: ' . 'index.php');
                }
            
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
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

                if($_FILES['img']['name'] == null) {
                    $user = [
                        "login" => $login,
                        "password" => $pass1,
                        "admin" => $admin,
                    ];
    
                    $id = update("users", $id, $user);
                    header('location: ' . 'index.php');
                }else {
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
        
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
        
                            $user = [
                                "login" => $login,
                                "password" => $pass1,
                                "admin" => $admin,
                                "photo" => $_POST['img']
                            ];
                
                            $id = update("users", $id, $user);
                            $topic = selectOne("users", ['id' => $id]);
                            header('location: ' . 'index.php');
                        }
                    
                    }else{
                        array_push($errMsg, "Ошибка получения картинки.");
                    }
                }

                // $user = [
                //     "login" => $login,
                //     "password" => $pass1,
                //     "admin" => $admin,
                //     "photo" => "тут тип путь"
                // ];

                // $id = update("users", $id, $user);
                // header('location: ' . 'index.php');
            }else {
                array_push($errMsg, "Пароли не совпадают.");
            }
        }else {
            if($_FILES['img']['name'] == null) {
                $user = [
                    "login" => $login,
                    "admin" => $admin,
                ];
    
                $id = update("users", $id, $user);
                header('location: ' . 'index.php');
            }else {
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
    
                        $pass = password_hash($pass, PASSWORD_DEFAULT);
    
                        $user = [
                            "login" => $login,
                            "admin" => $admin,
                            "photo" => $_POST['img']
                        ];
            
                        $id = update("users", $id, $user);
                        $topic = selectOne("users", ['id' => $id]);
                        header('location: ' . 'index.php');
                    }
                
                }else{
                    array_push($errMsg, "Ошибка получения картинки.");
                }
            }
        }

    }
