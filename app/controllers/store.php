<?php
    include("../../database/db.php");
    include("controllers.php");
    include("../../helps/validationImg.php");
    include("../../helps/validationData.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $title = "";
    $descript = "";

    // Код создания магазина
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddStore'])) {
        
        $store = new StoreData($_POST);

        if ($store->validation() === false) {
            if (!empty($_FILES['img']['name'])) {
                $imgStore = new StoreImg($_FILES);

                if ($imgStore->validation() === false) {
                    $imgStore->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                    
                    $store = [
                        "name" => $store->title,
                        "description" => $store->descript,
                        "photo" => $_POST['img']
                    ];

                    StoreControll::create("store", $store);
                }else {
                    array_push($errMsg, $imgStore->validation());
                }
                        
            }else{
             array_push($errMsg, "Ошибка получения картинки.");
            }
        }else {
            array_push($errMsg, $store->validation());
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

        $store = new StoreData($_POST);

        if ($store->validation() === false) {
            $id = $store->id;

            if ($_FILES['img']['name'] == null) {
                $store = [
                    "name" => $store->title,
                    "description" => $store->descript
                ];
            
                StoreControll::change("store", $id, $store);
            }else {
                if (!empty($_FILES['img']['name'])) {
                    $imgStore = new StoreImg($_FILES);
    
                    if ($imgStore->validation() === false) {
                        $imgStore->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                        
                        $store = [
                            "name" => $store->title,
                            "description" => $store->descript,
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
            
        }else {
            array_push($errMsg, $store->validation());
        }

    }