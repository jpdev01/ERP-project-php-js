<?php

$id = $_POST['vendaid'];
include "../../security/database/connection.php";
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);
$stm_sql->execute();

$venda = $stm_sql->fetch(PDO::FETCH_ASSOC);
$data = date('d/m/Y h:m', strtotime($venda['data']));
$products = $venda['produtos'];
$products = unserialize($products);
$nomeProdutos = [];
foreach ($products as $p) {
  $sql = "SELECT nome FROM produtos WHERE code=:code";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':code', $p);
  $stm_sql->execute();
  $nomeProdutos[] = $stm_sql->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="card bg-light w-100">
  <div class="card-header">Informações da venda:</div>
  <div class="card-body">
    <!-- <h5 class="card-title">Light card title</h5> -->
    <p class="card-text">
      <p class="font-weight-bold d-inline"> Data: </p><?php echo $data; ?>
    </p>
    <p class="card-text">
      <p class="font-weight-bold d-inline">Valor total: </p>R$ <?php echo $venda['vlrTotal']; ?>
    </p>
    <p class="card-text">
      <p class="font-weight-bold d-inline">Cliente: </p><?php echo $venda['nomecliente']; ?>
    </p>
    <?php
    if ($venda['dsc'] != 0) {
    ?>
      <p class="card-text">
        <p class="font-weight-bold d-inline">Desconto: </p>R$<?php echo $venda['dsc']; ?>
      </p>
    <?php
    }
    ?>

    <?php
    if ($venda['frmPgto'] == 0) {
      $frmPgto = 'Dinheiro';
    } else if ($venda['frmPgto'] == 1) {
      $frmPgto = 'Cartão de crédito';
    } else if ($venda['frmPgto'] == 2) {
      $frmPgto = 'Cartão de débito';
    } else if ($venda['frmPgto'] == 3) {
      $frmPgto = 'Cheque';
    } else if ($venda['frmPgto'] == 4) {
      $frmPgto = 'Crediário';
    } else if ($venda['frmPgto'] == 5) {
      $frmPgto = 'Depósito / Transferência';
    } else if ($venda['frmPgto'] == 6) {
      $frmPgto = 'PIX';
    }
    if ($venda['metPgto'] == 0) {
      $metPgto = 'A vista';
      $qtdeParc = "";
    } else {
      $metPgto = 'Parcelado';
      $qtdeParc = ", " . $venda['qtdeParc'] . "x";
    }
    ?>
    <p class="card-text">
      <p class="font-weight-bold d-inline">Forma de pagamento: </p><?php echo $frmPgto . ", " . " " . $metPgto . $qtdeParc; ?>
    </p>
    <p class="card-text">
      <p class="font-weight-bold d-inline">Valor quitado: </p>R$ <?php echo $venda['vlrPago']; ?>
    </p>
    <p class="card-text">
      <p class="font-weight-bold d-inline">Produtos:
      </p>
      <?php
      foreach ($nomeProdutos as $key => $product) {
        echo ($key + 1). ": " . $product['nome']."\n";
      }
      ?>
    </p>
  </div>
</div>


<button type="button" class="btn btn-light btn-sm m-2" onclick="productExchange({idVenda: <?php echo $id; ?>});">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
  </svg>
  Registrar troca de produto</button>

  <button type="button" class="btn btn-light btn-sm m-2" onclick="viewHistoric_sell({idVenda: <?php echo $id; ?>});">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>
  Visualizar histórico</button>