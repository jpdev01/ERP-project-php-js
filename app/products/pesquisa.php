<?php

$filtros = array();
$category = (isset($_POST['categoryid']) ? $_POST['categoryid'] : null);
$provider = (isset($_POST['providerid']) ? $_POST['providerid'] : null);

$status = (isset($_POST['status']) ? $_POST['status'] : null);
// $indisponivel = (isset($_POST['status-1']) ? $_POST['status-1'] : null);
$msg = "";
//começamos a concatenar nossa tabela
if( $category ){ $filtros[] = " `categorias_id` = '{$category}'"; }
if( $provider ){ $filtros[] = " `fornecedores_id` = '{$provider}'"; }
if ($status=="todos"){
  $status="";
}else{
  if($status=="disponíveis"){
    $status=0;
  }else if($status=="indisponíveis"){
    $status=1;
  }
  $filtros[] = " `status` = '{$status}'";
}

//requerimos a classe de conexão
include '../../security/database/connection.php';
$sql = "SELECT p.*, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id";
if ( sizeof( $filtros ) ){
  $sql.= ' WHERE ';
}
if( sizeof( $filtros ) ){
  $sql .= implode( ' AND ',$filtros );
}
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> execute();

$products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
?>
<div class='table-responsive'>
  <table id='employee_table' class='table table-sm table-striped'>
    <thead class='thead-dark'>
      <tr>
        <th scope="col">Code</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Valor</th>
        <th scope="col">Descrição</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($products as $product){
        $status = $product['status'];
        if ($status==0){
          $status = "Disponível";
        }else if ($status==1){
          $status = "Indisponível";
        }
        else{
          $status =  "Indisponível(troca)";
        }
        ?>
        <tr onclick="conteudo('#content', 'products', 'focus', '<?php echo $product['id']; ?>')">
          <td> <?php echo $product['code'] ?> </td>
          <td> <?php echo $product['nome'] ?> </td>
          <td> <?php echo $product['nomecategoria'] ?> </td>
          <td> <?php echo $product['vlrVenda'] ?> </td>
          <td> <?php echo $product['dsc'] ?> </td>
          <td> <?php echo $status; ?> </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
