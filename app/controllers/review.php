<?php
    include("../../path.php");
    include("../database/db.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnRev'])) {
        $comment = trim($_POST["comment"]);

        if($comment === "") {
            echo("Введите отзыв");
        }
        else{
            $params = [
                "comment" => $comment
            ];

            insert("review", $params);
            header('location: ' . BASE_URL);
        }
    }