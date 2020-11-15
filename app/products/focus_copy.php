<?php

$id = $_POST['id'];
include "../../security/database/connection.php";
$sql = "SELECT p.*, c.nome AS nomecategoria, f.nome AS nomefornecedor FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id INNER JOIN fornecedores f ON p.fornecedores_id = f.id WHERE p.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$product = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>

<div class="card bg-light mb-3" style="max-width: 500px;">
  <div class="card-header">Informações do produto: <?php echo $product['nome'];?></div>
  <div class="card-body">
    <!-- <h5 class="card-title">Light card title</h5> -->
    <p class="card-text">Categoria:
      <?php echo $product['nomecategoria'];
      if ($product['colecao']!='' && $product['colecao']!=null){
        echo ' --- Coleção: '.$product['colecao'];
      }
      ?></p>
      <p class="card-text">Valor de venda: R$<?php echo $product['vlrVenda'];?></p>
      <?php
      if($product['status']==0){
        $status='Disponível';
      }else if($product['status']==1){
        $status='Indisponível';
      }else{
        $status='Indisponível(troca)';
      }
      ?>
      <p class="card-text">Status: <?php echo $status; ?>, Quantidade: <?php echo $product['qtde']; ?></p>
      <p class="card-text">Tamanho: <?php echo $product['tam'];?></p>
      <p class="card-text">Codigo de barras: <?php echo $product['code'];?></p>
      <p class="card-text">Data de compra: <?php echo $product['dataCompra'];?> --- Fornecedor: <?php echo $product['nomefornecedor'];?></p>

      <p class="card-text">Informações gerais: <?php
      $arr=array();
      $txt='';
      if($product['genero']!='' && $product['genero']!=null){
        if ($product['genero']=='0'){
          $g = 'Feminino';
        }else if ($product['genero']=='1'){
          $g = 'Masculino';
        }else{
          $g= 'unissex';
        }
        $arr[]=$g;
      }
      if($product['cor']!='' && $product['cor']!=null){
        $arr[]=$product['cor'];
      }
      if($product['estilo']!='' && $product['estilo']!=null){
        $arr[]=$product['estilo'];
      }
      foreach ($arr as $contadora => $value) {
        $txt.= $value;
        if (isset($arr[$contadora+1])){
          $txt.= ', ';
        }
      }
      echo $txt.'.';
      ?></p>
      <p class="card-text">Descrição: <?php echo $product['dsc'];?></p>
      <?php
      if ($status=="Disponível"){
        ?>
        <a class="card-link" onclick="troca_produto('<?php echo $product['id']; ?>', '<?php echo $product['nome']; ?>')">REGISTRAR TROCA</a>
        <?php
      }
      ?>



    </div>
  </div>
