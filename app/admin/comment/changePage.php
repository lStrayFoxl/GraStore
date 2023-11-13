<?php
    session_start();

    include("../../../path.php");
    include("../../controllers/comment_admin.php");
    include("../../helps/errorInfo.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GraStore</title>
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/admin.css">
  </head>
  <body>

    <!-- Header -->
    <?php include("../../include/header.php"); ?>

    <section class="main">
        <div class="container">

            <!-- Admin panel -->
            <div class="admin_block row">
                <!-- Side Bar -->
                <?php include("../../include/side-bar_admin.php"); ?>

                <div class="col-9">
                    <div class="button row">
                        <a href="index.php" class="col-2 btn back_btn">Назад</a>
                    </div>

                    <div class="row title-table">
                        <h2>Изменение данных комментария</h2>
                    </div>

                    <div class="row add-post">
                        <div class="mb-12 col-12 col-md-12 err">
                        <!-- Вывод ошибок с массива -->
                        <?php if (count($errMsg) > 0): ?>
                            <ul>
                                <?php ErrorInfo::errorView($errMsg); ?>
                            </ul>
                        <?php endif; ?>
                        </div>
                        <form action="changePage.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$id;?>">
                            <div class="col mb-4">
                                <input value="<?=$id_user; ?>" name="title" type="text" class="form-control" placeholder="Id user" aria-label="Название магазина">
                            </div>
                            <div class="col mb-4">
                                <input value="<?=$id_store; ?>" name="title" type="text" class="form-control" placeholder="Id store" aria-label="Название магазина">
                            </div>
                            <div class="col">
                                <label for="editor" class="form-label">Комментарий</label>
                                <textarea name="comment" class="form-control" id="editor" rows="6"><?=$comment; ?></textarea>
                            </div>

                            <div class="col col-6 mt-4">
                                <button name="btnChangeComment" class="btn back_btn" type="submit">Изменить</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <?php include("../../include/footer.php"); ?>

    <!-- Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>