<?php
  $id           = $_POST['id'];
  $status=2;
  $qtde=0;
  $msg = "erro de programação";


    include "../../security/database/connection.php";
      $sql = "UPDATE produtos SET status=:status, qtde=:qtde WHERE id=:id";
      $stm_sql = $db_connection-> prepare ($sql);

      $stm_sql-> bindParam(':id', $id);
      $stm_sql-> bindParam(':status', $status);
      $stm_sql-> bindParam(':qtde', $qtde);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Alteração efetuada com sucesso!";
      }else{
        $msg = "Falha ao alterar!";
      }
  echo $msg;
?>
