<?php

include "../../security/database/connection.php";

  $sql ="SELECT * FROM usuarios WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $user = $stm_sql->fetch(PDO::FETCH_ASSOC);
