<?php

abstract class Controll
{
    abstract public static function create($table, $params);

    abstract public static function delete($table, $id);

    abstract public static function change($table, $id, $params);
}

class StoreControll extends Controll
{
    public static function create($table, $params)
    {
        insert($table, $params);
        header('location: ' . 'index.php');
    }

    public static function delete($table, $id)
    {
        delete($table, $id);
        header('location: ' . 'index.php');
    }

    public static function change($table, $id, $params)
    {
        $id = update($table, $id, $params);
        header('location: ' . 'index.php');
    }
}

class CommentControll
{
    public static function create($table, $params)
    {
        insert($table, $params);
        header('location: ' . 'storePage.php?store_id=' . $params["id_store"]);
    }
}

class ReviewControll
{
    public static function create($table, $params)
    {
        insert($table, $params);
        header('location: ' . BASE_URL);
    }
}

class UserControll
{
    public static function create($table, $params)
    {
        insert($table, $params);
        header('location: ' . BASE_URL);
    }

    public static function change($table, $id, $params)
    {
        $id = update($table, $id, $params);
        header('location: ' . BASE_URL . "/pages/profile.php");
    }

    public static function AuthUser($array) {
        $_SESSION['id'] = $array['id'];
        $_SESSION['login'] = $array['login'];
        $_SESSION['admin'] = $array['admin'];
    
        if($_SESSION['admin']){
            header('location: ' . BASE_URL . '/app/admin/store/index.php');
        }else {
            header('location: ' . BASE_URL);
        }
    }

    public static function unlogin() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('location: ' . BASE_URL);
    }
}