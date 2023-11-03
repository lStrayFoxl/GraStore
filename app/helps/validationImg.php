<?php

    abstract class Img 
    {   
        public $imgName;
        public $fileTmpName;
        public $fileType;
        public $destination;
        public $size;

        public function __construct($array) {
            $this->imgName = time() . "_" .  $array['img']['name'];
            $this->fileTmpName = $array['img']['tmp_name'];
            $this->fileType = $array['img']['type'];
            $this->destination = ROOT_PATH . "\assets\img\store\\" . $this->imgName;
            $this->size = $array['img']['size'];
        }

        abstract public function validation();

        final public function getServer() {
            $result = move_uploaded_file($this->fileTmpName, $this->destination);
            if ($result) {
                $_POST['img'] = $this->imgName;
                return false;
            }else{
                return "Ошибка загрузки изображения на сервер.";
            }
        }

    }

    class StoreImg extends Img 
    {
        public function validation()
        {
            if (strpos($this->fileType, 'image') === false) {
                return "Подгружаемый файл не является изображением!";
        
            }elseif($this->size > (1000 * 1024)){
                return "Размер загружаймого файла не может превышать 500КБ.";
        
            }elseif(getimagesize($this->fileTmpName)[0] > 1600 || getimagesize($this->fileTmpName)[1] > 1000){
                return "Разрешение загружаймого изображения не может превышать 1600*1000.";
        
            }else{
                return false;
            }
        }

    }