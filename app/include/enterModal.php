<!-- Modal section -->
<section class="modal_sect">

    <!-- Modal Input Window -->
    <div class="modal" id="modalView">
        <div class="container">
            <div class="modal_content">
                <div class="input_info">
                    <form action="assets/handler.php" method="get" class="form_comment">

                        <legend class="title_create">Авторизация</legend>
                        <label for="enterName" class="name">Login:</label>
                        <input type="text" name="enterName" id="enterName" class="enter_name">
                        <div class="row mb-2"></div>
                        <label for="enterCom" class="text_com">Password:</label>
                        <input type="password" name="enterCom" id="enterCom" class="enter_com"></input><br><br>

                        <div class="center_btn">
                            <button type="submit" class="btn btn-big create_btn" name="createBtn">Войти</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Connecting to js -->
    <script src="assets/js/script.js"></script>

</section>