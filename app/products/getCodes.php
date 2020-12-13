<?php
include "../../security/database/connection.php";

$code = isset($_POST['code']) ? $_POST['code'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
if ($code)
{
    $sql = "SELECT id FROM produtos WHERE code=:code";
    if($id){
        $sql.=" AND id<>:id";
    }
    $stm_sql = $db_connection->prepare($sql);
    if($id){
        $stm_sql->bindParam(':id', $id);
    }
    $stm_sql->bindParam(':code', $code);
    $stm_sql->execute();
    $qtde = $stm_sql->rowCount();
    echo $qtde;
}
else 
{
    $sql = "SELECT code FROM produtos ORDER BY id ASC";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->execute();
    $qtde = $stm_sql->rowCount();
    if ($qtde > 0){
        $codes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        $qtde = (int) $qtde -1;
        $code = $codes[$qtde];
        echo $code['code'];
    } else {
        echo 0;
    }
    
}

?>
