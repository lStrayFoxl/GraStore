<?php
    include("../../database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $title = "";
    $descript = "";

    // Код создания магазина
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddStore'])) {
        
        $title = trim($_POST["title"]);
        $descript = trim($_POST["description"]);

    
        if ($title === '' || $descript === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($title, 'UTF8') <= 2) {
            array_push($errMsg, "Название должно быть больше 2-ми символов.");
        }else {
            if (!empty($_FILES['img']['name'])) {
                $imgName = time() . "_" .  $_FILES['img']['name'];
                $fileTmpName = $_FILES['img']['tmp_name'];
                $fileType = $_FILES['img']['type'];
                $destination = ROOT_PATH . "\assets\img\store\\" . $imgName;
                
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

                    $store = [
                        "name" => $title,
                        "description" => $descript,
                        "photo" => $_POST['img']
                    ];
        
                    $id = insert("store", $store);
                    $topic = selectOne("store", ['id' => $id]);
                    header('location: ' . 'index.php');
                }
            
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
            
        }

    }

    // Код удаление магазина
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        delete("store", $id);
        header('location: ' . 'index.php');

    }

    // Код изменение данных магазина
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $store = selectOne("store", ['id' => $id]);

        $title = $store['name'];
        $descript = $store['description'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeStore'])) {

        $id = trim($_POST["id"]);
        $title = trim($_POST["title"]);
        $descript = trim($_POST["description"]);

        if ($title === '' || $descript === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($title, 'UTF8') <= 2) {
            array_push($errMsg, "Название должно быть больше 2-ми символов.");
        }elseif($_FILES['img']['name'] == null) {
            $store = [
                "name" => $title,
                "description" => $descript
            ];

            $id = update("store", $id, $store);
            header('location: ' . 'index.php');
        }else {
            if (!empty($_FILES['img']['name'])) {
                $imgName = time() . "_" .  $_FILES['img']['name'];
                $fileTmpName = $_FILES['img']['tmp_name'];
                $fileType = $_FILES['img']['type'];
                $destination = ROOT_PATH . "\assets\img\store\\" . $imgName;
                
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

                    $store = [
                        "name" => $title,
                        "description" => $descript,
                        "photo" => $_POST['img']
                    ];
        
                    $id = update("store", $id, $store);
                    header('location: ' . 'index.php');
                }
            
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
        }

    }