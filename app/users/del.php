<?php

  $id = $_POST['id'];

  include "../../security/database/connection.php";

  $sql = "DELETE FROM clientes WHERE id=:id";

  $stm_sql = $db_connection->prepare($sql);

  $stm_sql-> bindParam(':id', $id);

  $result = $stm_sql->execute();
  if($result){
    $msg = "Exclusão efetuada com sucesso!";
  }else{
    $msg = "Falha ao Excluir!";
  }
echo $msg;
?>
