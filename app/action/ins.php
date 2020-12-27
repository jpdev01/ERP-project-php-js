<?php
// OTIMIZAR TUDO !
if (isset($table)){
  include '../../security/database/connection.php';
  if (!isset($params['date'])){
    $date = date("Y-m-d");
  }
  if (!isset($params['hour'])){
    $hour = date("H:i:s");
  }
  $id_afected = searchLastId($table, $db_connection);
  $id_afected = intval($id_afected);
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
    $stm_sql-> bindParam(':name', $name);
    $stm_sql-> bindParam(':type', $type);
    $stm_sql-> bindParam(':id_afected', $id_afected);
    $stm_sql-> bindParam(':table_afected', $table);
    $stm_sql-> bindParam(':date', $date);
    $stm_sql-> bindParam(':hour', $hour);

    $result = $stm_sql->execute();
    
}
/*
else{

$params = [];
$params['type'] = isset($_POST['type']) ? $_POST['type'] : null;
$params['name']  = isset($_POST['name']) ? $_POST['name'] : null;
$params['table_afected']  = isset($_POST['table_afected']) ? $_POST['table_afected'] : null;
newActionDatabase($params);

}

function newActionDatabase($params){
  include '../../security/database/connection.php';
  if (!isset($params['id_afected']) || $params['id_afected'] == null){
    $params['id_afected'] = searchLastId($params['table_afected'], $db_connection);
    $params['id_afected'] = intval($params['id_afected']);
      //$params['id_afected'] = $db_connection->lastInsertId(); res:0
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
}
*/

function searchLastId($table, $db_connection){
  $sql = "SELECT id FROM ".$table;
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->execute();
  $result = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  $lastId = $result[count($result) - 1];
  $lastId = $lastId['id'];
  return intval($lastId);
}
?>
