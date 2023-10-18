<?php
    session_start();

    include("../../../path.php");
    include("../../controllers/store.php");
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
                        <h2>Добавление магазина</h2>
                    </div>

                    <div class="row add-post">
                        <div class="mb-12 col-12 col-md-12 err">
                        <!-- Вывод ошибок с массива -->
                        <?php if (count($errMsg) > 0): ?>
                            <ul>
                                <?php foreach ($errMsg as $error): ?>
                                    <li><?=$error?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php //include("../../app/helps/errorInfo.php"); ?>  
                        </div>
                        <form action="addPage.php" method="post" enctype="multipart/form-data">
                            <div class="col mb-4">
                                <input value="<?=$title; ?>" name="title" type="text" class="form-control" placeholder="Название магазина" aria-label="Название магазина">
                            </div>
                            <div class="col">
                                <label for="editor" class="form-label">Описание магазина</label>
                                <textarea name="description" class="form-control" id="editor" rows="6"><?=$descript; ?></textarea>
                            </div>
                            <div class="input-group col mb-4 mt-4">
                                <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <div class="col col-6">
                                <button name="btnAddStore" class="btn back_btn" type="submit">Добавить магазин</button>
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