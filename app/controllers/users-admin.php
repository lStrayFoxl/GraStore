<?php
    include("../../database/db.php");
    include("controllers.php");
    include("../../helps/validationImg.php");
    include("../../helps/validationData.php");
    if (!$_SESSION) {
        header('location: ' . BASE_URL . '/log.php');
    }

    $errMsg = [];
    $login = "";
    $pass = "";

    // Код создания пользователя
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddUser'])) {

        $user = new UserData($_POST);

        if ($user->validation() === false) {
            if (!empty($_FILES['img']['name'])) {
                $imgUser = new UserImg($_FILES);

                if ($imgUser->validation() === false) {
                    $imgUser->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                    $pass = password_hash($user->pass, PASSWORD_DEFAULT);

                    $user = [
                        "login" => $user->login,
                        "password" => $pass,
                        "admin" => $user->admin,
                        "photo" => $_POST['img']
                    ];

                    StoreControll::create("users", $user);
                }else {
                    array_push($errMsg, $imgUser->validation());
                }
                        
            }else{
                array_push($errMsg, "Ошибка получения картинки.");
            }
        }else {
            array_push($errMsg, $user->validation());
        }

    }

    // Код удаление пользователя
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {

        $id = trim($_GET['delete_id']);

        StoreControll::delete("users", $id);
    }

    // Код изменение данных магазина
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['change_id'])) {

        $id = trim($_GET['change_id']);
        $user = BdWork::selectOne("users", ['id' => $id]);

        $login = $user['login'];
        $pass = $user['password'];
        $admin = $user['admin'];

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnChangeUser'])) {
        $user = new UserData($_POST);

        if ($user->validationChange() === false) {
            $id = $user->id;

            if ($user->pass !== "" && $user->pass2 !== "") {
                if($user->pass === $user->pass2) {
                    $pass = password_hash($user->pass, PASSWORD_DEFAULT);

                    if ($_FILES['img']['name'] == null) {
                        $user = [
                            "login" => $user->login,
                            "password" => $pass,
                            "admin" => $user->admin
                        ];
                    
                        StoreControll::change("users", $id, $user);
                    }else {
                        if (!empty($_FILES['img']['name'])) {
                            $imgUser = new UserImg($_FILES);
            
                            if ($imgUser->validation() === false) {
                                $imgUser->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());

                                $user = [
                                    "login" => $user->login,
                                    "password" => $pass,
                                    "admin" => $user->admin,
                                    "photo" => $_POST['img']
                                ];
            
                                StoreControll::change("users", $id, $user);
                            }else {
                                array_push($errMsg, $imgUser->validation());
                            }
                                    
                        }else{
                            array_push($errMsg, "Ошибка получения картинки.");
                        }
                    }
                }else {
                    array_push($errMsg, "Пароли не совпадают.");
                }
            }else {
                if ($_FILES['img']['name'] == null) {
                    $store = [
                        "name" => $store->title,
                        "description" => $store->descript
                    ];

                    $user = [
                        "login" => $user->login,
                        "admin" => $user->admin
                    ];
                
                    StoreControll::change("users", $id, $user);
                }else {
                    if (!empty($_FILES['img']['name'])) {
                        $imgUser = new UserImg($_FILES);
        
                        if ($imgUser->validation() === false) {
                            $imgUser->getServer() === false ? "" : array_push($errMsg, $imgStore->getServer());
                            
                            $user = [
                                "login" => $user->login,
                                "admin" => $user->admin,
                                "photo" => $_POST['img']
                            ];
        
                            StoreControll::change("users", $id, $user);
                        }else {
                            array_push($errMsg, $imgUser->validation());
                        }
                                
                    }else{
                        array_push($errMsg, "Ошибка получения картинки.");
                    }
                }
            }
            
            
        }else {
            array_push($errMsg, $user->validationChange());
        }

    }
