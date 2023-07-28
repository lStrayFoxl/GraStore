<?php

    $driver =  'mysql';
    $host =  'localhost';
    $db_name = 'GraStore';
    $db_user = 'root';
    $db_pass = 'root';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    try {
        $dbh = new PDO(
            "$driver:host=$host;dbname=$db_name;charset=$charset",
            $db_user, $db_pass, $options
        );
    } catch (RDOException $i) {
        die("Ошибка подключения к базе данных");
    }