<?php
    include("../app/database/db.php");
    include("controllers.php");
    include("../app/helps/validationData.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/index.php');
    }

    $errMsg = [];
    $id_user = "";
    $id_store = "";
    $comment = "";

    // Код создания комментария
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnComment'])) {
        $comment = new CommentData($_POST);

        if ($comment->validation() === false) {
            $comment = [
                "id_user" => $_SESSION['id'],
                "id_store" => $comment->id_store,
                "comment" => $comment->comment
            ];

            CommentControll::create("comments", $comment);
            
        }else {
            array_push($errMsg, $comment->validation());
        }
    }