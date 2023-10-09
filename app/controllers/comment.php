<?php
    include("../app/database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $id_user = "";
    $id_store = "";
    $comment = "";

    // Код создания комментария
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnComment'])) {

        $id = trim($_POST["id_store"]);
        $comment = trim($_POST["comment"]);

    
        if ($comment === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($comment, 'UTF8') <= 5) {
            array_push($errMsg, "Комментарий должен быть больше 5-ти символов.");
        }else {
            $comment = [
                "id_user" => $_SESSION['id'],
                "id_store" => $id,
                "comment" => $comment,
            ];

            $id = insert("comments", $comment);
            $topic = selectOne("comments", ['id' => $id]);
            header('location: ' . 'storePage.php?store_id=' . $id);
        }

    }