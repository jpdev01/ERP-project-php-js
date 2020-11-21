<?php
include "../security/database/connection.php";

$data = ($_POST['data'] != "" ) ? $_POST['data']: "";
$table = ($data['table']) ? ($data['table']) : "";
if ($table){

  $param = ($data['param']) ? ($data['param']) : " * ";
  $where = ($data['where']) ? ($data['where']) : "";
  $order = ($data['order']) ? ($data['order']) : "";
  $items = ($data['items']) ? ($data['items']) : "";
  if ($where){
    $where = " WHERE " + $where;
    $where +=
  }

  if ($order){
    $order = " ORDER BY " $order;
  }
  $sql = "SELECT " + $param + " FROM " + $table + $where + $order;
  $stm_sql = $db_connection->prepare($sql);
  foreach ($items as $item) {
    $stm_sql->bindParam(':id', $id);
  }
  $stm_sql->bindParam(':id', $id);
  $stm_sql-> execute();

  $cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
}

?>
