<?php
    include("../../database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];

    // Код создания магазина
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddStore'])) {

        // include("../../app/helps/validationImage.php");

        $title = trim($_POST["title"]);
        $descript = trim($_POST["description"]);

    
        if ($title === '' || $descript === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($title, 'UTF8') <= 2) {
            array_push($errMsg, "Название должно быть больше 2-ми символов.");
        }else {
            $store = [
                "name" => $title,
                "description" => $descript,
                "photo" => "тут тип путь"
            ];

            $id = insert("store", $store);
            $topic = selectOne("store", ['id' => $id]);
            header('location: ' . 'index.php');
        }

    }else {
        $title = '';
        $descript = '';
    }