<?php
    include("../../database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $id_user = "";
    $id_store = "";
    $comment = "";

    // // Код создания магазина
    // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddStore'])) {

    //     // include("../../app/helps/validationImage.php");

    //     $title = trim($_POST["title"]);
    //     $descript = trim($_POST["description"]);

    
    //     if ($title === '' || $descript === '') {
    //         array_push($errMsg, "Не все поля заполнены!");
    //     }elseif(mb_strlen($title, 'UTF8') <= 2) {
    //         array_push($errMsg, "Название должно быть больше 2-ми символов.");
    //     }else {
    //         $store = [
    //             "name" => $title,
    //             "description" => $descript,
    //             "photo" => "тут тип путь"
    //         ];

    //         $id = insert("store", $store);
    //         $topic = selectOne("store", ['id' => $id]);
    //         header('location: ' . 'index.php');
    //     }

    // }

    // Код удаления комментария
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        delete("comments", $id);
        header('location: ' . 'index.php');

    }

    // Код изменение данных комментария
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $comment = selectOne("comments", ['id' => $id]);

        $id_user = $comment['id_user'];
        $id_store = $comment['id_store'];
        $comment = $comment['comment'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeComment'])) {

        $id = trim($_POST["id"]);
        $comment = trim($_POST["comment"]);

        if ($comment === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($comment, 'UTF8') <= 5) {
            array_push($errMsg, "Название должно быть больше 5-ми символов.");
        }else {
            $comment = [
                "comment" => $comment
            ];

            $id = update("comments", $id, $comment);
            header('location: ' . 'index.php');
        }

    }