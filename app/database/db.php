<?php
    require('connect.php');

    class BdCheck {
      //Проверка выполнения запроса к бд
      final protected static function dbCheckError($query) {
        $errInfo = $query->errorInfo();

        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
        return true;
      }
    }

    final class BdWork extends BdCheck {
      public static function tt($value){
        echo '<pre>';
        print_r($value);
        echo '</pre>';
        exit();
      }

      //Запрос на получение данных с одной таблицы
      public static function selectAll($table, $params = []){
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
      
        BdWork::dbCheckError($query);
      
        return $query->fetchAll();
      }

      //Запрос на получение одной строки с выбранной таблицы
      public static function selectOne($table, $params = []){
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
      
        BdWork::dbCheckError($query);
      
        return $query->fetch();
      }

      //Запись в таблицу  бд
      public static function insert($table, $params) {
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
      
        BdWork::dbCheckError($query);
        return $dbh->lastInsertId();
      }

      //Обновление строки в таблице
      public static function update($table, $id, $params) {
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
    
        $sql = "UPDATE $table SET $str WHERE `id` = $id";
        $query = $dbh->prepare($sql);
        $query->execute();
      
        BdWork::dbCheckError($query);
      }

      //Удаление строки в таблице
      public static function delete($table, $id) {
        global $dbh;
      
        $sql = "DELETE FROM $table WHERE `id` = $id";
        $query = $dbh->prepare($sql);
        $query->execute();
      
        BdWork::dbCheckError($query);
      }

    }

    final class UniqueRequest extends BdCheck {
      // Поиск по слову
      public static function searchInWord($term, $table) {
        global $dbh;

        $text = trim(strip_tags(stripcslashes(htmlspecialchars($term))));

        $sql = "SELECT s.* FROM $table AS s 
                WHERE s.name LIKE '%$text%'";

        $query = $dbh->prepare($sql);
        $query->execute();

        UniqueRequest::dbCheckError($query);

        return $query->fetchAll();
      }

      // Поиск пользователя
      public static function searchInUser($term, $table) {
        global $dbh;

        $text = trim(strip_tags(stripcslashes(htmlspecialchars($term))));

        $sql = "SELECT u.* FROM $table AS u 
                WHERE u.login LIKE '%$text%'";

        $query = $dbh->prepare($sql);
        $query->execute();

        UniqueRequest::dbCheckError($query);

        return $query->fetchAll();
      }

      // Поиск комментариев и отзывов
      public static function searchInComment($term, $table) {
        global $dbh;

        $text = trim(strip_tags(stripcslashes(htmlspecialchars($term))));

        $sql = "SELECT u.* FROM $table AS u 
                WHERE u.comment LIKE '%$text%'";

        $query = $dbh->prepare($sql);
        $query->execute();

        UniqueRequest::dbCheckError($query);

        return $query->fetchAll();
      }

      // Выборка комментариев с польователем
      public static function selectCommentsFromWithUsers($table1, $table2, $id_store) {
        global $dbh;

        $sql = "SELECT c.*, u.login FROM $table1 AS c JOIN $table2 AS u ON c.id_user = u.id WHERE c.id_store = $id_store";

        $query = $dbh->prepare($sql);
        $query->execute();

        UniqueRequest::dbCheckError($query);

        return $query->fetchAll();
      }
    }
