<?php
    session_start();

    include("../../../path.php");
    include("../../database/connect.php");
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
            
            <!-- Search -->
            <div class="section search">
                <h3>Поиск:</h3>
                <div class="row">
                    <form action="#" method="post" class="col-10">
                        <input type="text" name="search-term" class="text-input">
                    </form>

                    <div class="col-2">
                        <a href="#" class="btn btn-big add_btn">Добавить</a>
                    </div>
                </div>
                
            </div>

            <!-- Admin panel -->
            <div class="admin_block row">
                <!-- Side Bar -->
                <?php include("../../include/side-bar_admin.php"); ?>

                <div class="panel col-9">
                    <div class="col_bar row">
                        <div class="col-1 center_cont">
                            <span>Id</span>
                        </div>

                        <div class="col-7">
                            <span>Название</span>
                        </div>

                        <div class="col-4">
                            <span>Управление</span>
                        </div>
                    </div>

                    <div class="data_row row">
                        <div class="col-1 center_cont">
                            <span>1</span>
                        </div>

                        <div class="col-7">
                            <span>Lorem ipsum</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Изменить</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Удалить</span>
                        </div>
                    </div>

                    <div class="data_row row">
                        <div class="col-1 center_cont">
                            <span>2</span>
                        </div>

                        <div class="col-7">
                            <span>Lorem ipsum</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Изменить</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Удалить</span>
                        </div>
                    </div>

                    <div class="data_row row">
                        <div class="col-1 center_cont">
                            <span>3</span>
                        </div>

                        <div class="col-7">
                            <span>Lorem ipsum</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Изменить</span>
                        </div>

                        <div class="col-2 center_cont">
                            <span class="control">Удалить</span>
                        </div>
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