<?php

$id = $_POST['id'];
include "../../security/database/connection.php";
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$venda = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>

<div class="card bg-light mb-3" style="max-width: 500px;">
  <div class="card-header">Informações da venda:</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Light card title</h5> -->
    <p class="card-text">Data: <?php echo $venda['data'];?></p>
    <p class="card-text">Valor total: R$ <?php echo $venda['vlrTotal'];?></p>
    <p class="card-text">Cliente:<?php echo $venda['nomecliente'];?></p>
    <p class="card-text">Desconto: R$ <?php echo $venda['dsc'];?></p>
    <?php
    if($venda['frmPgto']==0){
      $frmPgto='Dinheiro';
    }else if($venda['frmPgto']==1){
      $frmPgto='Cartão de crédito';
    }else if($venda['frmPgto']==2){
      $frmPgto='Cartão de débito';
    }else if($venda['frmPgto']==3){
      $frmPgto='Cheque';
    }else if($venda['frmPgto']==4){
      $frmPgto='Crediário';
    }else{
      $frmPgto='Depósito / Transferência';
    }
    if($venda['metPgto']==0){
      $metPgto='A vista';
      $qtdeParc = "";
    }else{
      $metPgto='Parcelado';
      $qtdeParc = "----".$venda['qtdeParc']."x";
    }
    ?>
    <p class="card-text">Forma de pagamento: <?php echo $frmPgto."----"." ".$metPgto.$qtdeParc; ?></p>
    <p class="card-text">Valor quitado: R$ <?php echo $venda['vlrPago'];?></p>
  </div>
</div>
