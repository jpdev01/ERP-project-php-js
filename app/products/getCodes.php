<?php
include "../../security/database/connection.php";
$sql = "SELECT code FROM produtos ORDER BY id ASC";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->execute();
$qtde = $stm_sql->rowCount();
$codes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
$qtde = (int) $qtde -1;
$code = $codes[$qtde];
echo $code['code'];
?>
