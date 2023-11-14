<?php
    include("../../database/db.php");
    include("controllers.php");
    include("../../helps/validationData.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $id_user = "";
    $id_store = "";
    $comment = "";

    // Код удаления комментария
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        StoreControll::delete("comments", $id);
    }

    // Код изменение данных комментария
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $comment = BdWork::selectOne("comments", ['id' => $id]);

        $id_user = $comment['id_user'];
        $id_store = $comment['id_store'];
        $comment = $comment['comment'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeComment'])) {
        $comment = new CommentData($_POST);

        if ($comment->validation() === false) {
            $id = $comment->id;

            $comment = [
                "comment" => $comment->comment
            ];

            StoreControll::change("comments", $id, $comment);
            
        }else {
            array_push($errMsg, $comment->validation());
        }

    }