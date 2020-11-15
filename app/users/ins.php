<?php
  $id=null;
  $usuario               = $_POST['usuario'];
  $senha            = $_POST['senha'];
  $email                = $_POST['email'];
  $permissao     = $_POST['permissao'];
  $ativo              = $_POST['ativo'];
  $dataAtiv           = $_POST['dataAtiv'];
  $dataDes            = ($_POST['dataDes']!='')?$_POST['dataDes']:null;
  $cpf            = $_POST['cpf'];
  $obs            = ($_POST['obs']!="")?$_POST['obs']:null;

  $msg = "erro de programação";

    include "../../security/database/connection.php";
    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario";
    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':usuario', $usuario);
    $stm_sql -> execute();

    if ($stm_sql->rowCount()==0){
      $sql = "INSERT INTO usuarios (id, usuario, senha, email, permissao, ativo, dataAtiv, dataDes, cpf, obs) VALUES (:id, :usuario, :senha, :email, :permissao, :ativo, :dataAtiv, :dataDes, :cpf, :obs)";
      $stm_sql = $db_connection-> prepare ($sql);

      $stm_sql-> bindParam(':id', $id);
      $stm_sql-> bindParam(':usuario', $usuario);
      $stm_sql-> bindParam(':senha', $senha);
      $stm_sql-> bindParam(':email', $email);
      $stm_sql-> bindParam(':permissao', $permissao);
      $stm_sql-> bindParam(':ativo', $ativo);
      $stm_sql-> bindParam(':dataAtiv', $dataAtiv);
      $stm_sql-> bindParam(':dataDes', $dataDes);
      $stm_sql-> bindParam(':cpf', $cpf);
      $stm_sql-> bindParam(':obs', $obs);


      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
      }else{
        $msg = "Falha ao cadastrar!";
      }
  }
  else{
    $msg= "Esse usuário já está cadastrado no banco de dados.";
  }
  echo $msg;
?>
