<?php
$tipo               = $_POST['tipo'];
$vlr               = $_POST['vlr'];
$obs          = ($_POST['obs']!="")?$_POST['obs']:null;
$data               = $_POST['data'];
$id=null;

include "../../security/database/connection.php"; //a função include importa um outro arquivo PHP
    $sql = "INSERT INTO caixa (id, vlr, data, obs, tipo) VALUES (:id, :vlr, :data, :obs, :tipo)";
    $stm_sql = $db_connection-> prepare ($sql);

    $stm_sql-> bindParam(':id', $id);
    $stm_sql-> bindParam(':vlr', $vlr);
    $stm_sql-> bindParam(':data', $data);
    $stm_sql-> bindParam(':obs', $obs);
    $stm_sql-> bindParam(':tipo', $tipo);


    $result = $stm_sql->execute();
    if ($tipo==0){
      $tipo='entrada';
    }else{
      $tipo='saída';
    }
    if($result){
      $msg = $tipo." de caixa registrada com sucesso!";
      // setcookie('pgto', '', -1);
    }else{
      $msg = 'erro ao registrar '.$tipo. " de caixa!";
    }
    // -- fim cadastro (inserir) do usuario -- //
  // }
  // else{
  //   $msg= "Erro ao efetuar pagamento";
  // }
echo $msg;

?>
