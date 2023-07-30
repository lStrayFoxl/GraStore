<?php
    session_start();
    // if(isset($_SESSION['login'])) { 
    //     echo "Сессия существует"; 
    // }
    // else { 
    //     session_destroy();
    //     echo "Такой сессии не существует";
    // }

    include("../path.php");
    include("../app/database/connect.php");
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
    
    <!-- ModalWindowEnter -->
    <?php include("../app/include/enterModal.php"); ?>

    <section class="main">
        <div class="container">
            <div class="block_back">
                <a href="/" class="btn btn-big btn_back">На главную</a>
            </div>
            <div class="content_block">
                <h3 class="article">Профиль</h3>

                <div class="contact">
                    <div class="row">
                        <div class="col-4 cont">
                            <a href="#" class="store">
                                <div class="photo_block">
                                    <img src="/assets/img/Magnit_icon.png" alt="Photo_profile" class="img_photo">
                                </div>
                            </a>
                        </div>

                        <div class="col-6 cont">
                            <span><?=$_SESSION["login"];?></span>
                            <br>
                            <?php if($_SESSION["admin"] == 1): ?>
                                <span>Admin</span>
                            <?php else: ?>
                                <span>User</span>
                            <?php endif; ?>
                            
                        </div>

                        <div class="col-2">
                            <form action="<?=BASE_URL . "/app/controllers/users.php";?>" method="get">
                                <button type="submit" class="btn btn-big profile-btn" name="btnExit">
                                    Exit
                                </button>
                            </form>

                            <a class="btn btn-big profile-btn" name="btnPhoto">
                                New Photo
                            </a>

                            <a class="btn btn-big profile-btn" name="btnAdmin">
                                Admin Panel
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <?php include("../app/include/footer.php"); ?>

    <!-- Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>