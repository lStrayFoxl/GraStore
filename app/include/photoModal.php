<!-- Modal section -->
<section class="modal_sect">

    <!-- Modal Enter Window -->
    <div class="modal" id="modalPhoto">
        <div class="container">
            <div class="center_cont">
                <div class="modal_content change_photo">
                    <div class="input_info">
                        <form action="<?=BASE_URL . "/app/controllers/users.php"?>" method="post" class="form_comment" enctype="multipart/form-data">

                            <legend class="title_create">Изменить фото</legend>
                            <div class="input-group col mb-4 mt-4">
                                <input name="img" type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <div class="center_btn">
                                <button type="submit" class="btn btn-big create_btn" name="changePhoto">Изменить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</section>