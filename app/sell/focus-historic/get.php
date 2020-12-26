<?php
$idVenda = isset($_POST['idVenda']) ? $_POST['idVenda'] : null;
if ($idVenda == null){
    $idVenda = isset($_GET['idVenda']) ? $_GET['idVenda'] : null;
}

include "../../security/database/connection.php";
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);
$stm_sql->execute();
$venda = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>