<?php
    session_start();
    include("../../path.php");
    include("../database/db.php");
    include("controllers.php");
    include("../helps/validationData.php");

    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/index.php');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnRev'])) {
        $comment = new ReviewData($_POST);

        if ($comment->validation() === false) {
            $review = [
                "userid" => $_SESSION['id'],
                "comment" => $comment->comment
            ];

            ReviewControll::create("review", $review);
            
        }else {
            array_push($errMsg, $comment->validation());
        }
    }