<?php
function set_prodoct($code, $status, $qtde){
  include '../../security/database/connection.php';
  $sql = "UPDATE produtos SET qtde=:qtde, status=:status WHERE code=:pcode"; //atualiza os dados dos produtos comprados
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql-> bindParam(':pcode', $code);
  $stm_sql-> bindParam(':qtde', $qtde);
  $stm_sql-> bindParam(':status', $status);

  $result = $stm_sql->execute();
}

include '../../security/database/connection.php';

session_start();
$user = $_SESSION['usuario'];
$sql = "SELECT id FROM usuarios WHERE usuario=:user";
$stm_sql = $db_connection->prepare($sql);
$stm_sql-> bindParam(':user', $user);
$stm_sql -> execute();
$user = $stm_sql->fetch(PDO::FETCH_ASSOC);
$iduser = $user['id'];

date_default_timezone_set('America/Sao_Paulo');

$data   = $_POST['date']!=null ? $_POST['date'] : Date('Y-m-d\TH:i',time());
$idcliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
$codes = isset($_COOKIE['codes']) ? $_COOKIE['codes'] : null;
$qtdes = isset($_COOKIE['qtdes']) ? $_COOKIE['qtdes'] : array();


$sql = "INSERT INTO delivery (id, data, clientes_id, produtos, usuarios_id) VALUES (:id, :data, :cliente, :produtos, :iduser)";
$stm_sql = $db_connection-> prepare ($sql);

$id = null;
$stm_sql-> bindParam(':id', $id);
$stm_sql-> bindParam(':data', $data);
$stm_sql-> bindParam(':cliente', $idcliente);
$stm_sql-> bindParam(':produtos', $codes);
$stm_sql-> bindParam(':iduser', $iduser);
// $stm_sql-> bindParam(':condicional', $condicional);

$result = $stm_sql->execute();
if($result){
  $msg = "Cadastro efetuado com sucesso!";
  $qtdes = unserialize ($qtdes);
  // var_dump ($qtdes);
  foreach ($qtdes as $key => $qtde){
    // echo 'posicao:'.$key.'valor:'.$qtde;
    $sql = "SELECT * from produtos WHERE code=:key";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':key', $key);
    $stm_sql -> execute();
    $product = $stm_sql->fetch(PDO::FETCH_ASSOC);
    $qtde_disponivel = $product['qtde'];
    $qtde_disponivel = $qtde_disponivel - $qtde;
    $status=0;
    if($qtde_disponivel==0){
      $status=1;
    }
    set_prodoct($key, $status, $qtde_disponivel);
  }
}
else{
  $msg = "Falha ao cadastrar!";
}
// -- fim cadastro (inserir) do usuario -- //



//--------------------- setar todos os cookies para zero -------------------------------
$arr=array();
$arr=serialize($arr);
setcookie('codes', $arr, null, '/');
setcookie('qtdes', $arr, null, '/');
setcookie('cliente', '', null, '/');
setcookie('sell', '', null, '/');
setcookie('explodesell', 'none', null, '/');
echo $msg;
?>
