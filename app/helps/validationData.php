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

    class UserData extends Data {
        public $id;
        public $login;
        public $pass;
        public $pass2;
        public $admin;

        public function __construct($array) {
            $this->id = isset($array["id"]) ? trim($array["id"]) : "";
            $this->login = trim($array["login"]);
            $this->pass = isset($array['password']) ? trim($array["password"]) : trim($array["password1"]);
            $this->pass2 = isset($array['password2']) ? trim($array["password2"]) : "";
            $this->admin = isset($array['admin']) ? 1 : 0;
        }

        public function validation() {
            if ($this->login === '' || $this->pass === '') {
                return "Не все поля заполнены!";
            }elseif(mb_strlen($this->login, 'UTF8') <= 2) {
                return "Логин должно быть больше 2-ми символов.";
            }else {
                return false;
            }
        }

        // TODO: подумать как обойтись без неё 
        // в проверке ползователя на изменении
        public function validationChange() {
            if ($this->login === '') {
                return "Не все поля заполнены!";
            }elseif(mb_strlen($this->login, 'UTF8') <= 2) {
                return "Логин должно быть больше 2-ми символов.";
            }else {
                return false;
            }
        }
    }

    class CommentData extends Data {
        public $id;
        public $comment;
        public $id_store;

        public function __construct($array) {
            $this->id = isset($array["id"]) ? trim($array["id"]) : "";
            $this->comment = trim($array["comment"]);
            $this->id_store = isset($array["id_store"]) ? trim($array["id_store"]) : "";
        }

        public function validation() {
            if ($this->comment === '') {
                return "Не все поля заполнены!";
            }elseif(mb_strlen($this->comment, 'UTF8') <= 5) {
                return "Комментарий должен быть больше 5-ти символов.";
            }else {
                return false;
            }
        }

    }

    class ReviewData extends Data {
        public $id;
        public $comment;

        public function __construct($array) {
            $this->id = isset($array["id"]) ? trim($array["id"]) : "";
            $this->comment = trim($array["comment"]);
        }

        public function validation() {
            if ($this->comment === '') {
                return "Не все поля заполнены!";
            }elseif(mb_strlen($this->comment, 'UTF8') <= 5) {
                return "Комментарий должен быть больше 5-ти символов.";
            }else {
                return false;
            }
        }

    }
