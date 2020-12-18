<?php
function generateBalanceFromValue($this_cliente, $this_saldo){
    $saldo = getSaldo($this_cliente);
    $newSaldo = intVal($saldo) + intVal($this_saldo);
    include '../../../security/database/connection.php';
    $sql = "UPDATE clientes SET credito=:newSaldo WHERE id=:idCliente";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':newSaldo', $newSaldo);
    $stm_sql->bindParam(':idCliente', $this_cliente);
    $result = $stm_sql->execute();
    return $result;
}

function getSaldo($idCliente){
    include '../../../security/database/connection.php';
    $sql = "SELECT credito FROM clientes WHERE id=:idCliente";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':idCliente', $idCliente);
    $result = $stm_sql->execute();
    $c = $stm_sql->fetch(PDO::FETCH_ASSOC);
    if ($c['credito'] == ""){
        return 0;
    }
    return $c['credito'];
}
?>