<?php
//recebemos nosso parâmetro vindo do form
$order="";
$where="";

$parametro = isset($_POST['tamanhop']) ? $_POST['tamanhop'] : null;
if($parametro != null){
  if ($where==""){
    $order="WHERE ";
  }else{$where .=" OR ";}
  $where .="tamanho='P'";
}
$parametro = isset($_POST['tamanhom']) ? $_POST['tamanhom'] : null;
if($parametro != null){
  if ($where==""){
    $order="WHERE ";
  }else{$where .=" OR ";}
  $where .="tamanho='M'";
}
$parametro = isset($_POST['tamanhog']) ? $_POST['tamanhog'] : null;
if($parametro != null){
  if ($where==""){
    $order="WHERE ";
  }else{$where .=" OR ";}
  $where .="tamanho='G'";
}
$parametro = isset($_POST['selectmin']) ? $_POST['selectmin'] : null;
if($parametro != null){
  if ($where==""){
    $order="WHERE ";
  }else{$where .=" AND ";}
  $where .="nsize>=$parametro";
}
$parametro = isset($_POST['selectmax']) ? $_POST['selectmax'] : null;
if($parametro != null){
  if ($where==""){
    $order="WHERE ";
  }else{$where .=" AND ";}
  $where .="nsize<=$parametro";
}
$msg = "";
//começamos a concatenar nossa tabela
$msg .="<table id='employee_table'>";
$msg .="    <thead>";
$msg .="        <tr>";
$msg .="            <th>Código do Cliente</th>";
$msg .="            <th>Nome</th>";
$msg .="            <th>CPF</th>";
$msg .="            <th>Telefone</th>";
$msg .="            <th>Celular</th>";
$msg .="            <th></th>";
$msg .="        </tr>";
$msg .="    </thead>";
$msg .="    <tbody>";

//requerimos a classe de conexão
include '../security/database/connection.php';
  $sql = "SELECT * FROM clientes $order $where ORDER BY nome ASC";
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> execute();

$users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
  $msg .="                <tr>";
  $msg .="                    <td>".$user['id']."</td>";
  $msg .="                    <td>".$user['nome']."</td>";
  $msg .="                    <td>".$user['cpf']."</td>";
  $msg .="                    <td>".$user['telefone']."</td>";
  $msg .="                    <td>".$user['celular']."</td>";
  $msg .="                    <td>".$user['celular']."</td>";
  $msg .="                    <td><a href='board.php?id=".$user['id']."'><button>+</button></td>";
  $msg .="                </tr>";
}
// }else{
//   $msg = "";
//   $msg .="Nenhum resultado foi encontrado...";
// }
$msg .="</tbody></table>";
//retorna a msg concatenada
echo $msg;
?>
