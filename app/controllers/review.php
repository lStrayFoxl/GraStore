<?php
    session_start();
    include("../../path.php");
    include("../database/db.php");

    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/index.php');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnRev'])) {
        $comment = trim($_POST["comment"]);

        if($comment === "") {
            echo("Введите отзыв");
        }
        else{
            $params = [
                "userid" => $_SESSION['id'],
                "comment" => $comment
            ];

            insert("review", $params);
            header('location: ' . BASE_URL);
        }
    }