<?php
    session_start();

    include("../path.php");

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
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>

    <!-- Header -->
    <?php include("../app/include/header.php"); ?>

    <section class="main">
        <div class="container">
            <div class="block_back">
                <a href="/" class="btn btn-big btn_back">На главную</a>
            </div>
            <div class="content_block">
                <h3 class="article">Контакты</h3>

                <div class="contact">
                    <div class="row">
                        <div class="col-3 cont">
                            <span>Email:</span>
                            <br>
                            <span>Test@mail.ru</span>
                        </div>

                        <div class="col-3 cont">
                            <span>Telegram:</span>
                            <br>
                            <span>TestTelegram</span>
                        </div>

                        <div class="col-3 cont">
                            <span>Phone:</span>
                            <br>
                            <span>+7(953)546-43-44</span>
                        </div>

                        <div class="col-3 cont">
                            <span>VK:</span>
                            <br>
                            <span>TestVK</span>
                        </div>
                    </div>
                </div>

                <h3 class="article link_art">Ссылки</h3>

                <div class="link_block">
                    <div class="row">
                        <div class="col-3 link">
                            <span>Ссылка 1:</span>
                            <br>
                            <a href="#">http://test1.com</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 link">
                            <span>Ссылка 2:</span>
                            <br>
                            <a href="#">http://test1.com</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 link">
                            <span>Ссылка 3:</span>
                            <br>
                            <a href="#">http://test1.com</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 link">
                            <span>Ссылка 4:</span>
                            <br>
                            <a href="#">http://test1.com</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <?php include("../app/include/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>