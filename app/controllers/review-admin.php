<?php
    include("../../database/db.php");
    include("controllers.php");
    include("../../helps/validationData.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $id_user = "";
    $comment = "";

    // Код удаления отзыва
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        StoreControll::delete("review", $id);
    }

    // Код изменение данных отзыва
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $review = BdWork::selectOne("review", ['id' => $id]);

        $id_user = $review['userid'];
        $comment = $review['comment'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeReview'])) {
        $review = new ReviewData($_POST);

        if ($review->validation() === false) {
            $id = $review->id;

            $review = [
                "comment" => $review->comment
            ];

            StoreControll::change("review", $id, $review);
            
        }else {
            array_push($errMsg, $review->validation());
        }

    }