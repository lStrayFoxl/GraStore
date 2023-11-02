<?php
    include("../../database/db.php");
    include("controllers.php");
    include("../../helps/validationImg.php");
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
                $imgStore = new StoreImg($_FILES);

                if ($imgStore->validation() === false) {
                    $imgStore->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                    
                    $store = [
                        "name" => $title,
                        "description" => $descript,
                        "photo" => $_POST['img']
                    ];

                    StoreControll::create("store", $store);
                }else {
                    array_push($errMsg, $imgStore->validation());
                }
            
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
            
        }

    }

    // Код удаление магазина
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        StoreControll::delete("store", $id);

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

            StoreControll::change("store", $id, $store);
        }else {
            if (!empty($_FILES['img']['name'])) {
                $imgStore = new StoreImg($_FILES);

                if ($imgStore->validation() === false) {
                    $imgStore->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                    
                    $store = [
                        "name" => $title,
                        "description" => $descript,
                        "photo" => $_POST['img']
                    ];
                    
                    StoreControll::change("store", $id, $store);
                }else {
                    array_push($errMsg, $imgStore->validation());
                }
                
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
        }

    }