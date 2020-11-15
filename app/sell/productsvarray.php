<?php
$code = isset($_POST['scannercode']) ? $_POST['scannercode'] : null;
if ($code!=null){
  //requerimos a classe de conexão
  include '../../security/database/connection.php';
  $sql = "SELECT * FROM produtos WHERE code=:code";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql-> bindParam(':code', $code);
  $stm_sql -> execute();

  $prod = $stm_sql->fetch(PDO::FETCH_ASSOC);
  if ($stm_sql->rowCount()!=0){
    $sql = "INSERT INTO tmpvenda (codep) VALUES (:codep)";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':codep', $code);
    $stm_sql -> execute();
  }
}
?>




<?php
$msg = "";
$produtostotal="";//array de produtos na compra
$contadora=0;//array de produtos na compra
  //começamos a concatenar nossa tabela

  //requerimos a classe de conexão
  include '../../security/database/connection.php';
  $sql = "SELECT * from tmpvenda";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();

  $prods = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  if ($stm_sql->rowCount()!=0){
    // $msg .="                <tbody>";
    $produtostotal=array();
    foreach($prods as $prod){
      $codeatual = $prod['codep'];

      $produtostotal[$contadora] = $codeatual;//array de produtos na compra
      $contadora++;//array de produtos na compra

      $sql = "SELECT * from produtos WHERE code=:codeatual";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql-> bindParam(':codeatual', $codeatual);
      $stm_sql -> execute();

      $produto = $stm_sql->fetch(PDO::FETCH_ASSOC);
    $msg .="                <tr>";
    $msg .="                    <td>".$produto['code']."</td>";
    $msg .="                    <td>".$produto['nome']."</td>";
    $msg .="                    <td>".$produto['categoria']."</td>";
    $msg .="                    <td>".$produto['valvd']."</td>";
    $msg .="                </tr>";
  }
  // $msg .="                </tbody>";
  }
  else{
    $msg = "";
    $msg .="Nenhum resultado foi encontrado...";
  }
  //retorna a msg concatenada
  $produtostotalserialize = serialize( $produtostotal );
  $produtostotalunserialize = unserialize( $produtostotalserialize );
var_dump($produtostotal);
echo '<br>';
echo '<br>';
var_dump($produtostotalserialize);
echo '<br>';
echo '<br>';
var_dump($produtostotalunserialize);
?>
