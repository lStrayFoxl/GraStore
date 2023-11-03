<?php

    abstract class Data
    {
        abstract public function __construct($array);

        abstract public function validation();
    }

    class StoreData extends Data {
        public $id;
        public $title;
        public $descript;

        public function __construct($array) {
            $this->id = isset($array["id"]) ? trim($array["id"]) : "";
            $this->title = trim($array["title"]);
            $this->descript = trim($array["description"]);
        }

        public function validation() {
            if ($this->title === '' || $this->descript === '') {
                return "Не все поля заполнены!";
            }elseif(mb_strlen($this->title, 'UTF8') <= 2) {
                return "Название должно быть больше 2-ми символов.";
            }else {
                return false;
            }
        }

    }
