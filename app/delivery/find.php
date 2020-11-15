<?php
include "../../security/database/connection.php";
$id_delivery   = isset($_POST['id']) ? $_POST['id'] : "";
if($id_delivery!=""){
  $sql = "SELECT d.*, c.nome AS nomecliente FROM delivery d INNER JOIN clientes c ON d.clientes_id = c.id WHERE d.id=:iddelivery";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':iddelivery', $id_delivery);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $delivery = $stm_sql->fetch(PDO::FETCH_ASSOC);
  $delivery_codes = $delivery['produtos'];
  setcookie('codes', $delivery_codes, null, "/");
  echo $delivery_codes;
}
?>
