<?php
include '../../../security/database/connection.php';
$codes = isset($_POST['exchangeListConfirmed']) ? $_POST['exchangeListConfirmed'] : null;
$idVenda = isset($_POST['idVenda']) ? $_POST['idVenda'] : null;

function get_venda($idVenda){
    include '../../../security/database/connection.php';
    $sql = "SELECT * FROM vendas WHERE id=:idVenda";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':idVenda', $idVenda);
    $result = $stm_sql->execute();
    return $stm_sql->fetch(PDO::FETCH_ASSOC);
}

function set_product($code, $status, $qtde)
{
    include '../../../security/database/connection.php';
    $sql = "UPDATE produtos SET qtde=:qtde, status=:status WHERE code=:pcode";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':pcode', $code);
    $stm_sql->bindParam(':qtde', $qtde);
    $stm_sql->bindParam(':status', $status);
    $result = $stm_sql->execute();
}

function get_product($code){
    include '../../../security/database/connection.php';
    $sql = "SELECT * FROM produtos WHERE code=:code";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':code', $code);
    $result = $stm_sql->execute();
    return $stm_sql->fetch(PDO::FETCH_ASSOC);
}

function remove($venda, $code){
    include '../../../security/database/connection.php';
    $sql = "UPDATE venda SET produtos=:newArrProducts, status=:status WHERE id=:idVenda";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':idVenda', $venda);
    $stm_sql->bindParam(':newArrProducts', $newArrProducts);
    
    $result = $stm_sql->execute();
}

function persistRemove($idVenda, $produtos){
    include '../../../security/database/connection.php';
    $produtos = serialize ($produtos);
    $sql = "UPDATE vendas SET produtos=:newArrProducts WHERE id=:idVenda";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':idVenda', $idVenda);
    $stm_sql->bindParam(':newArrProducts', $produtos);
    $result = $stm_sql->execute();
    return $result;
}

function organizeArray($products){
    $productsFull = [];
    foreach ($products as $key => $value){
        $productsFull[] = $value;
    }
    return $productsFull;
}

$venda = get_venda($idVenda);

$products = $venda['produtos'];
$products = unserialize($products);

$saldo = 0;
foreach ($codes as $key => $code){
    $product = get_product($code);
    if ($product){
        $product['qtde'] = intval($product['qtde']);
        if ($product['qtde'] + 1 > 0){
            $status = 0;
        } else {
            $status = 1;
        }
        set_product($code, $status, $product['qtde'] + 1);
        //Valida se a venda possui o produto
        $searchIndex = array_search($code, $products);
        if ($searchIndex >= 0){
            unset($products[$searchIndex]);
            $products = organizeArray($products);
            $saldo = $saldo + intVal($product['vlrVenda']);
        }
    }
    else{
        error();
    } 
}
if (isset($error)){

} else {
    $resAlteracao = persistRemove($idVenda, $products);
    if ($resAlteracao == 1){
        include "generate-balance.php";
        $resSaldo = generateBalanceFromValue($venda['clientes_id'], $saldo);
        if ($resSaldo == 1){
            echo "Produtos removidos com sucesso! Saldo gerado.";
        } else {
            error();
        }
    } else {
        error();
    }
}

function error(){
    echo "Houve um problema. Contate o Administrador";
}
?>
