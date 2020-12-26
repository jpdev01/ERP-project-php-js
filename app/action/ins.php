<?php
$params = [];
$params['type'] = isset($_POST['type']) ? $_POST['type'] : null;
$params['name']  = isset($_POST['name']) ? $_POST['name'] : null;
$params['table_afected']  = isset($_POST['table_afected']) ? $_POST['table_afected'] : null;
newActionDatabase($params);


function newActionDatabase($params){
    include '../../security/database/connection.php';
    if (!isset($params['id_afected']) || $params['id_afected'] == null){
        $params['id_afected'] = $db_connection->lastInsertId();
        $msg='entrou';
    }
    if (!isset($params['date'])){
      $params['date'] = date("Y-m-d");
    }
    if (!isset($params['hour'])){
      $params['hour'] = date("H:i:s");
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
    echo $msg;
}
?>
