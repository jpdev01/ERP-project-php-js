<?php

$filtros = array();
$category = (isset($_POST['category']) ? $_POST['category'] : null);
$provider = (isset($_POST['provider']) ? $_POST['provider'] : null);

$status = (isset($_POST['status']) ? $_POST['status'] : null);
// $indisponivel = (isset($_POST['status-1']) ? $_POST['status-1'] : null);
$msg = "";
//começamos a concatenar nossa tabela
if( $category ){ $filtros[] = " `categorias_id` = '{$category}'"; }
if( $provider ){ $filtros[] = " `fornecedores_id` = '{$provider}'"; }
if ($status=="todos"){
  $status="";
}
if( $status ){
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
