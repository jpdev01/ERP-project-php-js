<?php
$id                = $_POST['id'];
$usuario                = $_POST['usuario'];
$senha                  = $_POST['senha'];
$email                  = $_POST['email'];
$permissao              = $_POST['permissao'];
$ativo                  = $_POST['ativo'];
$dataativ               = $_POST['dataativ'];
$datades                = ($_POST['datades']!="")?$_POST['datades']:null;
$cpf                    = $_POST['cpf'];
$obs                    = ($_POST['obs']!="")?$_POST['obs']:null;
$msg = "";


include "../../security/database/connection.php";

$sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND id<>:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':usuario', $usuario);
$stm_sql->bindParam(':id', $id);
$stm_sql->execute();

if($stm_sql->rowCount()==0){
  $sql = "UPDATE usuarios SET usuario=:usuario, senha=:senha, email=:email, permissao=:permissao, ativo=:ativo, dataativ=:dataativ, datades=:datades, cpf=:cpf, obs=:obs WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql-> bindParam(':id', $id);
  $stm_sql-> bindParam(':usuario', $usuario);
  $stm_sql-> bindParam(':senha', $senha);
  $stm_sql-> bindParam(':email', $email);
  $stm_sql-> bindParam(':permissao', $permissao);
  $stm_sql-> bindParam(':ativo', $ativo);
  $stm_sql-> bindParam(':dataativ', $dataativ);
  $stm_sql-> bindParam(':datades', $datades);
  $stm_sql-> bindParam(':cpf', $cpf);
  $stm_sql-> bindParam(':obs', $obs);
  $result = $stm_sql->execute();

  if($result){
    $msg = "Alteração efetuada com sucesso!";
  }else{
    $msg = "Falha ao alterar!";
  }

}

else{
  $msg = "Esse usuário já está cadastrado no banco de dados.";
}
echo $msg;
?>
