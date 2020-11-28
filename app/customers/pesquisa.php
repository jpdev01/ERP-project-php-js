<?php
//recebemos nosso parâmetro vindo do form
$order="";
$where="";

$p = (isset($_POST['tamanhop']) ? $_POST['tamanhop'] : null);
$m = (isset($_POST['tamanhom']) ? $_POST['tamanhom'] : null);
$g = (isset($_POST['tamanhog']) ? $_POST['tamanhog'] : null);
$tamanho = Array();
if( $p ){ $tamanho[] = " `tam` = '{$p}'"; }
if( $m ){ $tamanho[] = " `tam` = '{$m}'"; }
if( $g ){ $tamanho[] = " `tam` = '{$g}'"; }

$min = (isset($_POST['selectmin']) ? $_POST['selectmin'] : null);
$max = (isset($_POST['selectmax']) ? $_POST['selectmax'] : null);
$cintura = Array();
if( $min ){ $cintura[] = " `medida` >= '{$min}'"; }
if( $max ){ $cintura[] = " `medida` <= '{$max}'"; }

$order = (isset($_POST['order']) ? $_POST['order'] : 0);
$advancedFilter = (isset($_POST['advancedFilter']) ? $_POST['advancedFilter'] : '');
if ($advancedFilter == "birthdays"){
  $dataAtual = date("Y-m-d");
  $advancedFilter = ' dataNascimento = '.$dataAtual;
}

$msg = "";
//começamos a concatenar nossa tabela


//requerimos a classe de conexão
include '../../security/database/connection.php';
$sql = "SELECT * FROM clientes";
if ( sizeof( $tamanho ) || sizeof( $cintura ) || ( $advancedFilter )){
  $sql.= ' WHERE ';
}
if( sizeof( $tamanho ) ){
  $sql .= implode( ' OR ',$tamanho );
}
if ( sizeof( $tamanho ) && sizeof( $cintura ) ){
  $sql.= ' AND ';
}
if( sizeof( $cintura ) ){
  $sql .= implode( ' AND ',$cintura );
}
if( $advancedFilter ){
  $sql .= $advancedFilter;
}
if( $order==0 ){
  $sql .= " ORDER BY nome ASC";
}else if($order==1){
  $sql .= " ORDER BY dataNascimento ASC";
}
// echo $sql;
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> execute();

$users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
echo $sql;
foreach($users as $user){
  ?>
  <tr onclick="conteudo('#content', 'customers', 'focus', '<?php echo $user['id']; ?>', 'null')">
    <td><?php echo $user['id']; ?></td>
    <td><?php echo $user['nome']; ?></td>
    <td><?php echo $user['cpf']; ?></td>
    <td><?php echo $user['fone']; ?></td>
    <td><?php echo $user['celular']; ?></td>
  </tr>
  <?php
}
// }else{
//   $msg = "";
//   $msg .="Nenhum resultado foi encontrado...";
// }

?>
