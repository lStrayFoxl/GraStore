<?php
    session_start();

    include("../path.php");
    include("../app/database/db.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['store_id'])) {

        $id = trim($_GET['store_id']);
        $store = selectOne("store", ['id' => $id]);

    }

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
                <h3 class="article"><?=$store["name"];?></h3>

                <div class="descript">
                    <div class="row">
                        <div class="foto_store col-4">
                            <div class="img_block">
                                <img src="../assets/img/Magnit_icon.png" alt="" class="img_store">
                            </div>
                        </div>
                        
                        <div class="descript_text col-8">
                            <p class="text_parag">
                                <?=$store["description"];?>
                            </p>
                        </div>
                        
                    </div>
                    
                </div>

                <div class="comment_form">
                    <div class="comment_container">
                        <h3 class="article_block">Оставить отзыв</h3>

                        <div class="form_block">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <textarea class="form-control form-text" rows="5"></textarea>
                                    
                                </div>
                                 <button type="submit" class="btn btn-big comment-btn" name="btnComment">
                                    Отправить
                                </button>
                            </form>
                        </div>
                    </div>
                    
                </div>

                <div class="comments_store">
                    <div class="comment_container">
                        <h3 class="article_block">Отзывы</h3>

                        <div class="comment_block">
                            <div class="user_name">Имя пользователя</div>
                            <p class="text_comment">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices 
                                lobortis mollis. Vivamus in ipsum id nisl tempor pellentesque. Integer rhoncus tortor a metus 
                                ultricies varius. Cras euismod ornare diam, sed egestas nulla scelerisque eu. Maecenas cursus 
                                nulla id mattis porttitor. Ut hendrerit, justo quis efficitur venenatis, arcu sapien finibus erat, 
                                nec efficitur erat est ac justo.
                            </p>
                        </div>

                        <div class="comment_block">
                            <div class="user_name">Имя пользователя</div>
                            <p class="text_comment">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices 
                                lobortis mollis. Vivamus in ipsum id nisl tempor pellentesque. Integer rhoncus tortor a metus 
                                ultricies varius. Cras euismod ornare diam, sed egestas nulla scelerisque eu. Maecenas cursus 
                                nulla id mattis porttitor. Ut hendrerit, justo quis efficitur venenatis, arcu sapien finibus erat, 
                                nec efficitur erat est ac justo.
                            </p>
                        </div>

                        <div class="comment_block">
                            <div class="user_name">Имя пользователя</div>
                            <p class="text_comment">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultrices 
                                lobortis mollis. Vivamus in ipsum id nisl tempor pellentesque. Integer rhoncus tortor a metus 
                                ultricies varius. Cras euismod ornare diam, sed egestas nulla scelerisque eu. Maecenas cursus 
                                nulla id mattis porttitor. Ut hendrerit, justo quis efficitur venenatis, arcu sapien finibus erat, 
                                nec efficitur erat est ac justo.
                            </p>
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