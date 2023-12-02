<!-- Modal section -->
<section class="modal_sect">

    <!-- Modal Enter Window -->
    <div class="modal" id="modalEnter">
        <div class="container">
            <div class="center_cont">
                <div class="modal_content">
                    <div class="input_info">
                        <form action="<?=BASE_URL . "/app/controllers/users.php"?>" method="post" class="form_comment">

                            <legend class="title_create">Авторизация</legend>
                            <label for="login" class="form_label">Login:</label>
                            <input type="text" name="login" id="login" class="login">
                            <div class="row mb-2"></div>
                            <label for="password" class="form_label">Password:</label>
                            <input type="password" name="password" id="password" class="password"></input>

                            <div class="center_btn">
                                <button type="submit" class="btn btn-big create_btn" name="enter">Войти</button>
                            </div>
                            <div class="center_btn">
                                <button type="button" class="reg_btn" id="reg">Зарегистрироваться</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Modal Registration Window -->
    <div class="modal" id="modalReg">
        <div class="container">
            <div class="center_cont">
                <div class="modal_content">
                    <div class="input_info">
                        <form action="<?=BASE_URL . "/app/controllers/users.php"?>" method="post" class="form_comment">

                            <legend class="title_create">Регистрация</legend>
                            <label for="login" class="form_label">Login:</label>
                            <input type="text" name="login" class="login">
                            <div class="row mb-2"></div>
                            <label for="password" class="form_label">Password:</label>
                            <input type="password" name="password1" class="password-reg"></input>
                            <div class="row mb-2"></div>
                            <label for="password" class="form_label">Repeat Password:</label>
                            <input type="password" name="password2" class="password-repit"></input>

                            <div class="center_btn">
                                <button type="submit" class="btn btn-big registr_btn" name="registr">Зарегистрироваться</button>
                            </div>
                            <div class="center_btn">
                                <button type="button" class="reg_btn" id="ent">Войти</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Connecting to js
    <script src="assets/js/script.js"></script> -->

</section>