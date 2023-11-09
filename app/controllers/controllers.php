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