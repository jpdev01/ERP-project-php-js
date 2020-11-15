<?php
$msg='';
$status_caixa = 0;
//requerimos a classe de conexão
include '../../security/database/connection.php';
$sql = "SELECT * FROM caixa";
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> execute();

$caixas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
foreach($caixas as $caixa){
  $msg .="                <tr>";
  $msg .="                    <td>".$caixa['data']."</td>";
  $tipo = $caixa['tipo'];
  $valor  = floatval($caixa['vlr']);
  $status_caixa  = floatval($status_caixa);
  if ($tipo=="1"){
    $class='text-danger';
    $status_caixa = $status_caixa - $valor;
    $valor = '-'.$caixa['vlr'];
  }else{
    $class='text-success';
    $status_caixa = $status_caixa + $valor;
      $valor = '+'.$caixa['vlr'];
  }
  setcookie("status_caixa", $status_caixa, null, '/');
  $msg .="                    <td class=".$class.">".$valor."</td>";
  $msg .="                    <td>".$caixa['obs']."</td>";
  $msg .="                </tr>";

}
// }else{
//   $msg = "";
//   $msg .="Nenhum resultado foi encontrado...";
// }
//retorna a msg concatenada
echo $msg;
?>
