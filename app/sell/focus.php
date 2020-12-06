<?php

$id = $_POST['vendaid'];
include "../../security/database/connection.php";
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$venda = $stm_sql->fetch(PDO::FETCH_ASSOC);
$data = date( 'd/m/Y h:m', strtotime($venda['data']));
?>

<div class="card bg-light w-100">
  <div class="card-header">Informações da venda:</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Light card title</h5> -->
    <p class="card-text"><p class="font-weight-bold d-inline"> Data: </p><?php echo $data;?></p>
    <p class="card-text"><p class="font-weight-bold d-inline">Valor total: </p>R$ <?php echo $venda['vlrTotal'];?></p>
    <p class="card-text"><p class="font-weight-bold d-inline">Cliente: </p><?php echo $venda['nomecliente'];?></p>
    <?php
    if ($venda['dsc'] != 0){
      ?>
      <p class="card-text"><p class="font-weight-bold d-inline">Desconto: </p>R$<?php echo $venda['dsc'];?></p>
      <?php
    }
    ?>
    
    <?php
    if($venda['frmPgto'] == 0){
      $frmPgto='Dinheiro';
    }else if($venda['frmPgto'] == 1){
      $frmPgto='Cartão de crédito';
    }else if($venda['frmPgto'] == 2){
      $frmPgto='Cartão de débito';
    }else if($venda['frmPgto'] == 3){
      $frmPgto='Cheque';
    }else if($venda['frmPgto'] == 4){
      $frmPgto='Crediário';
    }else if($venda['frmPgto'] == 5){
      $frmPgto='Depósito / Transferência';
    }else if($venda['frmPgto'] == 6){
      $frmPgto='PIX';
    }
    if($venda['metPgto']==0){
      $metPgto='A vista';
      $qtdeParc = "";
    }else{
      $metPgto='Parcelado';
      $qtdeParc = ", ".$venda['qtdeParc']."x";
    }
    ?>
    <p class="card-text"><p class="font-weight-bold d-inline">Forma de pagamento: </p><?php echo $frmPgto.", "." ".$metPgto.$qtdeParc; ?></p>
    <p class="card-text"><p class="font-weight-bold d-inline">Valor quitado: </p>R$ <?php echo $venda['vlrPago'];?></p>
  </div>
</div>
