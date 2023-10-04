<?php
    session_start();
    // if(isset($_SESSION['login'])) { 
    //     echo "Сессия существует"; 
    // }
    // else { 
    //     session_destroy();
    //     echo "Такой сессии не существует";
    // }

    include("path.php");
    include("app/database/connect.php");
    include("app/database/db.php");
    
    if(isset($_POST['search-term']) && $_POST['search-term'] !== "") {
        $term = $_POST['search-term'];
        $stores = searchInWord($term, "store");
    }else{
        $term = "";
        $stores = selectAll("store");
    }

    // $stores = selectAll("store");
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
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <!-- Header -->
    <?php include("app/include/header.php"); ?>
    
    <!-- ModalWindowEnter -->
    <?php include("app/include/enterModal.php"); ?>

    <section class="main">
        <div class="container">
            
            <!-- Search -->
            <div class="section search">
                <h3>Поиск магазина:</h3>
                <div class="row">
                    <form action="index.php" method="post">
                        <input value="<?=$term;?>" type="text" name="search-term" class="text-input">
                    </form>
                </div>
                
            </div>

            <!-- Div Stores -->
            <div class="stores row">
                <?php if (empty($stores)): ?>
                    <div class="col-12">
                        <span>Ничего не найдено.</span>
                    </div>
                <?php else: ?>
                    <?php foreach ($stores as $key => $store): ?>
                        <div class="col-4 block">
                            <a href="#" class="store">
                                <div class="store_block">
                                    <img src="/assets/img/Magnit_icon.png" alt="<?=$store['name'];?>" class="img_icon">
                                    <p class="title_store">
                                        <?=$store['name'];?>
                                    </p>
                                </div>
                            </a>
                            
                        </div>
                    <?php endforeach;?>
                <?php endif;?>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("app/include/footer.php"); ?>

    <!-- Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>