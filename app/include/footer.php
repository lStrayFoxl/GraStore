<div class="footer container-fluid">
        <div class="footer-content container">
            <div class="row">
            <div class="footer-section about col-md-4 col-12">
                <p>
                    <span class="name">GraStore</span> - данный сайт предназначен для просмотра и оценивания магазинов.
                    Тут вы можете поделится своим мнением о каком-либо магазине. 
                </p>
            </div>

            <div class="footer-section links col-md-4 col-12">
                <h3>Меню:</h3>
                <ul>
                    <a href="<?=BASE_URL?>">
                        <li>Главная</li>
                    </a>
                    <a href="<?= BASE_URL . "/pages/contact.php" ?>">
                        <li>Контакты</li>
                    </a>
                    <a href="<?= BASE_URL . "/pages/about_us.php" ?>">
                        <li>О нас</li>
                    </a>
                    <a href="<?=BASE_URL?>">
                        <li>Список магазинов</li>
                    </a>
                </ul>
            </div>

            <div class="footer-section contact-form col-md-4 col-12">
                <h3>Оставте отзыв о сайте</h3>
                <form action="<?=BASE_URL . "/app/controllers/review.php"?>" method="post">
                    <textarea name="comment" rows="4" class="text-input contact-input"></textarea>
                    <button type="submit" class="btn btn-big contact-btn" name="btnRev">
                        Отправить
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>