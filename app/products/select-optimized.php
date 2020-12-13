<?php
$codeProduct = isset($_POST['code']) ? $_POST['code'] : null;
$listCodes = isset($_POST['listCodes']) ? $_POST['listCodes'] : null;
if ($codeProduct){
    $codeProduct = " `code` = '{$codeProduct}'";
}
if ($listCodes){
    $listCodesSql = [];
    foreach ($listCodes as $code){
        $listCodesSql[] = " `code` = '{$code}'";
    }
}

include "../../security/database/connection.php";

  $sql ="SELECT * FROM produtos";
  if ($codeProduct != null){
      $sql.= " WHERE ".$codeProduct;
  }
  else if ($listCodesSql){
      $sql.= ' WHERE ';
      if( sizeof( $listCodesSql ) ){
        $sql .= implode( ' OR ',$listCodesSql );
      }
  }
  $stm_sql = $db_connection->prepare($sql);

  $stm_sql-> execute();

  $product = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  print json_encode($product);
  ?>
