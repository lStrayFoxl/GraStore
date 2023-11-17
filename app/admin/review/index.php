<?php
    session_start();

    include("../../../path.php");
    include("../../database/connect.php");
    include("../../database/db.php");

    if(isset($_GET['term'])) {
        $_POST['search-term'] = $_GET['term'];
    }

    if(isset($_POST['search-term']) && $_POST['search-term'] !== "") {
        $term = isset($_POST['search-term']) ? $_POST['search-term'] : $_GET['term'];

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        $offset = $limit * ($page - 1);
        $total_pages = round(BdWork::countRowComment('review', $term) / $limit, 0);
        
        $reviews = UniqueRequest::searchInComment($term, "review", $limit, $offset);
    }else{
        $term = "";

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        $offset = $limit * ($page - 1);
        $total_pages = round(BdWork::countRowComment('review', $term) / $limit, 0);

        $reviews = UniqueRequest::selectAllFromStore("review", $limit, $offset);
    }


    // if(isset($_POST['search-term']) && $_POST['search-term'] !== "") {
    //     $term = $_POST['search-term'];
    //     $reviews = UniqueRequest::searchInComment($term, "review");
    // }else{
    //     $term = "";
    //     $reviews = BdWork::selectAll("review");
    // }
    
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
                    <form action="index.php" method="post" class="col-10">
                        <input value="<?=$term;?>" type="text" name="search-term" class="text-input">
                    </form>
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
                            <span>Comment</span>
                        </div>

                        <div class="col-4">
                            <span>Управление</span>
                        </div>
                    </div>
                    <?php if(empty($reviews)):?>
                        <div class="data_row row">
                            <div class="col-12">
                                <span>Ничего не найдено.</span>
                            </div>
                        </div>
                    <?php else:?>
                        <?php foreach($reviews as $key => $review): ?>
                            <div class="data_row row">
                                <div class="col-1 center_cont">
                                    <span><?=$review['id'];?></span>
                                </div>

                                <div class="col-7">
                                    <?php if (strlen($review['comment']) < 30): ?>
                                        <span><?=$review['comment'];?></span>
                                    <?php else: ?>
                                        <span><?=mb_substr($review['comment'], 0, 30, 'UTF-8') . "...";?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="col-2 center_cont">
                                    <a href="<?='changePage.php?change_id='. $review['id'];?>" class="control">Изменить</a>
                                </div>

                                <div class="col-2 center_cont">
                                    <a href="<?='changePage.php?delete_id='. $review['id'];?>" class="control">Удалить</a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if ($total_pages > 1):?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item"><a class="page-link" href="?page=1&term=<?= $term; ?>">First</a></li>

                                    <?php if($page > 2): ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page - 2 ?>&term=<?= $term; ?>"><?= $page - 2 ?></a></li>
                                    <?php endif; ?>

                                    <?php if($page > 1): ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>&term=<?= $term; ?>"><?= $page - 1 ?></a></li>
                                    <?php endif; ?>
                                    
                                    <li class="page-item"><a class="page-link" href="?page=<?= $page ?>&term=<?= $term; ?>"><?= $page ?></a></li>

                                    <?php if($page < $total_pages): ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page +  1 ?>&term=<?= $term; ?>"><?= $page +  1 ?></a></li>
                                    <?php endif; ?>

                                    <?php if($page < ($total_pages - 1)): ?>
                                        <li class="page-item"><a class="page-link" href="?page=<?= $page +  2 ?>&term=<?= $term; ?>"><?= $page +  2 ?></a></li>
                                    <?php endif; ?>

                                    <li class="page-item"><a class="page-link" href="?page=<?= $total_pages; ?>&term=<?= $term; ?>">Last</a></li>
                                </ul>
                            </nav>
                        <?php endif;?>
                    <?php endif;?>
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