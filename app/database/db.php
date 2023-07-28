<?php

    require('connect.php');

    function tt($value){
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        exit();
    }

    //Проверка выполнения запроса к бд
    function dbCheckError($query){
        $errInfo = $query->errorInfo();

        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
        return true;
    }

    //Запрос на получение данных с одной таблицы
    function selectAll($table, $params = []){
    global $dbh;
  
    $sql = "SELECT * FROM $table";
  
    if (!empty($params)) {
      $i = 0;
      foreach ($params as $key => $value) {
        if (!is_numeric($value)) {
          $value = "'" . $value . "'";
        }
  
        if ($i === 0) {
          $sql = $sql . " WHERE $key = $value";
        }else {
          $sql = $sql . " AND $key = $value";
        }
        $i++;
      }
    }
  
    $query = $dbh->prepare($sql);
    $query->execute();
  
    dbCheckError($query);
  
    return $query->fetchAll();
  }
  
  //Запрос на получение одной строки с выбранной таблицы
  function selectOne($table, $params = []){
    global $dbh;
  
    $sql = "SELECT * FROM $table";
  
    if (!empty($params)) {
      $i = 0;
      foreach ($params as $key => $value) {
        if (!is_numeric($value)) {
          $value = "'" . $value . "'";
        }
  
        if ($i === 0) {
          $sql = $sql . " WHERE $key = $value";
        }else {
          $sql = $sql . " AND $key = $value";
        }
        $i++;
      }
    }
  
    $query = $dbh->prepare($sql);
    $query->execute();
  
    dbCheckError($query);
  
    return $query->fetch();
  }
  
  //Запись в таблицу  бд
  function insert($table, $params) {
    global $dbh;
  
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
      if ($i === 0) {
        $coll = $coll . "$key";
        $mask = $mask . "'" . "$value" . "'";
      }else {
        $coll = $coll . ", $key";
        $mask = $mask . ", '" . "$value" . "'";
      }
  
      $i++;
    }
  
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $dbh->prepare($sql);
    $query->execute();
  
    dbCheckError($query);
    return $dbh->lastInsertId();
  }
  
  //Обновление строки в таблице
  function update($table, $id, $params) {
    global $dbh;
  
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
      if ($i === 0) {
        $str = $str . $key . " = '" . $value . "'";
      }else {
        $str = $str . ", " . $key . " = '" . $value . "'";
      }
  
      $i++;
    }
  
    // UPDATE `users` SET `admin` = '1', `password` = '5555' WHERE `id` = '1'
    $sql = "UPDATE $table SET $str WHERE `id` = $id";
    $query = $dbh->prepare($sql);
    $query->execute();
  
    dbCheckError($query);
  }
  
  //Удаление строки в таблице
  function delete($table, $id) {
    global $dbh;
  
    // DELETE FROM `users` WHERE 0
    $sql = "DELETE FROM $table WHERE `id` = $id";
    $query = $dbh->prepare($sql);
    $query->execute();
  
    dbCheckError($query);
  }
  