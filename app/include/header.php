<div class="header">
    <div class="container">
        <div class="row header_menu">
            <div class="header_title col-10">
                <h1>
                    <a href="#" class="title">GraStore</a>
                </h1>
            </div>

            <div class="button_enter col-2">
                <?php if(isset($_SESSION['login'])): ?>
                    <a href="<?=BASE_URL . "/pages/profile.php"?>" class="enter" id=""><?=$_SESSION["login"];?></a>
                <?php else: ?>
                    <a href="#" class="enter" id="enter">Войти</a>
                <?php endif; ?>
            </div>
        </div>
            
    </div>
</div> 