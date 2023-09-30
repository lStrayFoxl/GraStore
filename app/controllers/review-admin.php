<?php
    include("../../database/db.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $id_user = "";
    $comment = "";

    // Код удаления отзыва
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        delete("review", $id);
        header('location: ' . 'index.php');

    }

    // Код изменение данных отзыва
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $review = selectOne("review", ['id' => $id]);

        $id_user = $review['userid'];
        $comment = $review['comment'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeReview'])) {

        $id = trim($_POST["id"]);
        $comment = trim($_POST["comment"]);

        if ($comment === '') {
            array_push($errMsg, "Не все поля заполнены!");
        }elseif(mb_strlen($comment, 'UTF8') <= 5) {
            array_push($errMsg, "Название должно быть больше 5-ми символов.");
        }else {
            $review = [
                "comment" => $comment
            ];

            $id = update("review", $id, $review);
            header('location: ' . 'index.php');
        }

    }