<?php
$venda = isset($_COOKIE['pgto']) ? $_COOKIE['pgto'] : 'erro';
$venda=unserialize($venda);
$idvenda = $venda['id'];
$vlr   = ($_POST['pgto-venda-selec']!="")?$_POST['pgto-venda-selec']:'erro';
$obs         = $_POST['obs'];
$frmpgto         = $_POST['frmpgto'];
$data = date('Y-m-d');
$msg = "erro de programação";


include "../../security/database/connection.php"; //a função include importa um outro arquivo PHP

  // - inicio cadastro (inserir) do usuario -- //
  $vlrTotal = $venda['vlrTotal'];
  $vlrPago = $venda['vlrPago'];
  $vlrPago = $vlrPago + $vlr;
  if($vlrPago>$vlrTotal){
    $msg="Valor excedido. Falha ao realizar pagamento!";
  }else{
    $sql = "INSERT INTO pagamentos (id, vlr, data, obs, vendas_id, frmPgto) VALUES (:id, :vlr, :data, :obs, :idvenda, :frmPgto)";//DBO= PARAMETROS (SGBD:LOCAL HOST QUE ESTA ARMAZENANDO ESSE SGBD; NOME DO BANCO DE DADOS DENTRO DO HOST Q VAMOS EXECUTAR, CONJUNTO DE CARACTERES PARA EXECUTAR ESSA CONEXAO) , "PROXIMOS PARAMETROS" ==> 1-USUARIO


    $stm_sql = $db_connection-> prepare ($sql);

    $id = null;

    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':vlr', $vlr);
    $stm_sql-> bindParam(':data', $data);
    $stm_sql-> bindParam(':obs', $obs);
    $stm_sql-> bindParam(':idvenda', $idvenda);
    $stm_sql-> bindParam(':frmPgto', $frmPgto);


    $result = $stm_sql->execute();

    if($result){
      $sql = "UPDATE vendas SET vlrPago=:vlrPago WHERE id=:idvenda";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(':vlrPago', $vlrPago);
      $stm_sql->bindParam(':idvenda', $idvenda);
      $stm_sql->execute();
      $msg = "Pagamento efetuado com sucesso!";
      setcookie('pgto', '', -1);
    }else{
      $msg = "Falha ao efetuar pagamento!";
    }
    // -- fim cadastro (inserir) do usuario -- //
  // }
  // else{
  //   $msg= "Erro ao efetuar pagamento";
  // }
  }
echo $msg;
$table = "pagamentos";
$type = "insert";
$name = $idvenda;
include "../action/ins.php";
?>
