<?php
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}

$id = $_POST['id'];
include "../../security/database/connection.php";
$sql = "SELECT p.*, c.nome AS nomecategoria, f.nome AS nomefornecedor FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id INNER JOIN fornecedores f ON p.fornecedores_id = f.id WHERE p.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$product = $stm_sql->fetch(PDO::FETCH_ASSOC);


if($product['status']==0){
  $status='Disponível';
}else if($product['status']==1){
  $status='Indisponível';
}else{
  $status='Indisponível(troca)';
}

if ($product['genero']=='0'){
  $g = 'Feminino';
}else if ($product['genero']=='1'){
  $g = 'Masculino';
}else{
  $g= 'unissex';
}
?>


<div class="row container m-0 mw-100">
  <div class='container h-100'>
    <ul class="nav nav justify-content-center nav-pills nav-fill flex-column flex-sm-row m-2">
      <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/products/&file=library.php"><img src='assets/css/bootstrap-icons-1.0.0/arrow-left.svg' width='' height='' class="mr-2">Voltar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/products/&file=focus.php&id=<?php echo $id; ?>"><img src='assets/css/bootstrap-icons-1.0.0/list.svg' width='' height='' class="mr-2">Dados</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/customers/&file=historic.php&id=<?php echo $id; ?>"><img src='assets/css/bootstrap-icons-1.0.0/bag-fill.svg' width='' height='' class="mr-2">Compras</a>
      </li> -->
    </ul>
  </div>
</div>



<div class="row container mt-3 h-75 myscrool mypagina">
  <div class="col-12">
    <div class="row">
      <div class="col-8">
        <h5><img src='assets/css/bootstrap-icons-1.0.0/list.svg' width='50' height='50' >
        Produto: <?php echo $product['nome'];?></h5>
      </div>
      <div class="col-4">
      <h5 class="text-right">
      Valor: R$ <?php echo $product['vlrVenda'];?></h5>
    </div>
    </div>
    <div class="row">


      <div class="col-6">
        <p class="border-bottom"><strong>Detalhes</strong></p>
        <div class="row">
        <div class="col">
          <p><strong>Categoria: </strong><?php echo $product['nomecategoria'];?></p>
          <p><strong>Coleção: </strong><?php echo $product['colecao'];?></p>
          <p><strong>Tamanho: </strong><?php echo $product['tam'];?></p>
          <p><strong>gênero: </strong><?php echo $g;?></p>
        </div>
        <div class="col">
          <p><strong>Cor: </strong><?php echo $product['cor'];?></p>
          <p><strong>Estilo: </strong><?php echo $product['estilo'];?></p>
          <p><strong>Descrição: </strong><?php echo $product['dsc'];?></p>
        </div>
      </div>
      </div>



      <div class="col-3">
        <p class="border-bottom"><strong>Estoque: </strong></p>
        <p><strong>Status: </strong><?php echo $status;?></p>
        <p><strong>Quantidade: </strong><?php echo $product['qtde'];?></p>
        <p><strong>Código de barras: </strong><?php echo $product['code'];?></p>
      </div>

      <div class="col-3">
        <p class="border-bottom"><strong>Entrada: </strong></p>
        <p><strong>Data de compra: </strong><?php echo $product['dataCompra'];?></p>
        <p><strong>Fornecedor: </strong><?php echo $product['nomefornecedor'];?></p>
        <p><strong>Valor pago: </strong><?php echo $product['vlrPago'];?></p>
        <p><strong>Categoria: </strong><?php echo $product['nomecategoria'];?></p>
      </div>

    </div>
    <div class="row">
      <div class="col-12">
      <div class="btn-group pull-right" role="group" aria-label="Third group">
        <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/products/&file=frmupd.php&id=<?php echo $product['id']; ?>" class="text-dark">Editar  <img src='assets/css/bootstrap-icons-1.0.0/pencil.svg'></a></button>
      </div>
    </div>
    </div>
  </div>
</div>
