

<?php
if(isset($_COOKIE['codes'])) {
  $codes = $_COOKIE['codes'];
} else {
  $codes = array();
}
$msg = "";
$var = "";
$total=0;
$code = isset($_POST['scannercode']) ? $_POST['scannercode'] : null;
if ($code!=null){
  //requerimos a pasta de conexão
  include '../../security/database/connection.php';
  $sql = "SELECT * FROM produtos WHERE code=:code";//ve se o produto existe
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql-> bindParam(':code', $code);
  $stm_sql -> execute();

  $produto = $stm_sql->fetch(PDO::FETCH_ASSOC);
  if ($stm_sql->rowCount()!=0){
    $msg .="                <tr>";
    $msg .="                    <td>".$produto['code']."</td>";
    $msg .="                    <td>".$produto['nome']."</td>";
    $msg .="                    <td>".$produto['categoria']."</td>";
    $msg .="                    <td> R$".$produto['valvd']."</td>";
    $total += $produto['valvd'];
    $msg .="                </tr>";
    $var .="                <tr>";
    $var .="                    <td></td>";
    $var .="                    <td></td>";
    $var .="                    <td></td>";
    $var .="                    <td>Total: R$".$total."</td>";
    $var .="                </tr>";
    array_push($codes, $code);//adiciona o code no array
  }//coloca o array no cookie temporário


}
$codes = serialize($codes);
setcookie('codes', $codes);
$codes = unserialize($codes);
echo $msg;
echo $var;

?>
