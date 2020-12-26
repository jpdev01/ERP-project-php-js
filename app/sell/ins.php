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


$vlrTotal = isset($_COOKIE['sell']) ? $_COOKIE['sell'] : 0;
$data   = isset($_POST['date']) ? $_POST['date'] : 'erro';
$frmpgto   = ($_POST['frmpgto']!="")? $_POST['frmpgto'] : 'erro'; // O->dinheiro  1-> cartao de crédito     3->cartão de débito  4->cheque  5--> crediário
$metPgto= ($_POST['metPgto']!="")?$_POST['metPgto']: 0; // 0-> avista 1->parcelado
$qtdeParc = ($_POST['qtdeparc']!="")?$_POST['qtdeparc'] : 1;  // quantidade de parcelas no pagamento
$vlrPago   = ($_POST['entrada']!="")?$_POST['entrada']: 0;
$desconto   = ($_POST['desc']!="")?$_POST['desc']: 0;
$idcliente = isset($_POST['cliente']) ? $_POST['cliente'] : null;
$codes = isset($_COOKIE['codes']) ? $_COOKIE['codes'] : null;
$qtdes = isset($_COOKIE['qtdes']) ? $_COOKIE['qtdes'] : array();
$nomeCliente = isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : "";
$bandeira = isset($_POST['flag']) ? $_POST['flag'] : null;

// $condicional=0;


if ($metPgto==0){//avista
  $vlrPago = $vlrTotal;
}
// $sql = "SELECT id, nome FROM clientes WHERE nome=:nome";
// $stm_sql = $db_connection->prepare($sql);
// $stm_sql-> bindParam(':nome', $cliente);
// $stm_sql -> execute();
// $cliente_table = $stm_sql->fetch(PDO::FETCH_ASSOC);
// $idcliente = $cliente_table['id'];
// $nomecliente = $cliente_table['nome'];

$col = ['id', 'vlrTotal', 'data', 'dsc', 'metPgto', 'frmPgto', 'vlrPago', 'qtdeParc', 'clientes_id', 'produtos', 'usuarios_id', 'bandeira'];
$sql = "INSERT INTO vendas (";
foreach ($col as $key => $value){
  $sql.= $value;
        if ($key + 1 !=  sizeof($col)){
          $sql.= ", ";
        }else{
          $sql.= ") VALUES (";
        }
}

foreach ($col as $key => $value) {
  $sql.= ":".$value;
  if ($key + 1 != sizeof($col)){
    $sql.= ", ";
  }else{
    $sql.= ")";
  }
}

$stm_sql = $db_connection-> prepare ($sql);

$id = null;
$stm_sql-> bindParam(':id', $id);
$stm_sql-> bindParam(':vlrTotal', $vlrTotal);
$stm_sql-> bindParam(':data', $data);
$stm_sql-> bindParam(':dsc', $desconto);
$stm_sql-> bindParam(':metPgto', $metPgto);
$stm_sql-> bindParam(':frmPgto', $frmpgto);
$stm_sql-> bindParam(':vlrPago', $vlrPago);
$stm_sql-> bindParam(':qtdeParc', $qtdeParc);
$stm_sql-> bindParam(':clientes_id', $idcliente);
$stm_sql-> bindParam(':produtos', $codes);
$stm_sql-> bindParam(':usuarios_id', $iduser);
$stm_sql-> bindParam(':bandeira', $bandeira);
// $stm_sql-> bindParam(':condicional', $condicional);

$result = $stm_sql->execute();
if($result){
  if ($frmpgto==0){ //dinheiro, vai p caixa
    $sql = "INSERT INTO caixa (id, vlr, data, obs, tipo) VALUES (:id, :vlr, :data, :obs, :tipo)";
    $stm_sql = $db_connection-> prepare ($sql);
    $id=null;
    $tipo=0;
    $obs='Venda efetuada para '.$nomeCliente;
    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':vlr', $vlrPago);
    $stm_sql-> bindParam(':data', $data);
    $stm_sql-> bindParam(':obs', $obs);
    $stm_sql-> bindParam(':tipo', $tipo);
    $result = $stm_sql->execute();
  }
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
