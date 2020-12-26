<?php

function newActionDatabase($params){
    include '../../security/database/connection.php';
    if ($params['id_afected'] == null){
        $params['id_afected'] = $db_connection->lastInsertId();
    }
    $cols = ['id', 'type', 'name', 'date', 'hour', 'id_afected', 'table_afected'];
    $sql = "INSERT INTO actions (";
    foreach ($cols as $key => $value) {
        $sql.= $value;
        if ($key + 1 !=  sizeof($cols)){
          $sql.= ", ";
        }else{
          $sql.= ") VALUES (";
        }
      }
      foreach ($cols as $key => $value) {
        $sql.= ":".$value;
        if ($key + 1 != sizeof($cols)){
          $sql.= ", ";
        }else{
          $sql.= ")";
        }
      }

    $stm_sql = $db_connection-> prepare ($sql);
    $id = null;
    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':name', $params['name']);
    $stm_sql-> bindParam(':type', $params['type']);
    $stm_sql-> bindParam(':id_afected', $params['id_afected']);
    $stm_sql-> bindParam(':table_afected', $params['table_afected']);
    $stm_sql-> bindParam(':date', $params['date']);
    $stm_sql-> bindParam(':hour', $params['hour']);

    $result = $stm_sql->execute();
}
