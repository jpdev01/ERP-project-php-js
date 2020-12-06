<?php
$id       = $_POST['id'];
$nome               = $_POST['nome'];
$apelido            = $_POST['apelido'];
$cpf                = $_POST['cpf'];
$dataNascimento     = $_POST['dataNascimento'];
$email              = $_POST['email'];
$fone           = $_POST['fone'];
$celular            = $_POST['celular'];
$rg                 = $_POST['rg'];
$logradouro          = ($_POST['logradouro']!="")?$_POST['logradouro']:"";
  $complemento         = ($_POST['complemento']!="")?$_POST['complemento']:"";
  $bairro            = ($_POST['bairro']!="")?$_POST['bairro']:"";
  $cidade            = ($_POST['cidade']!="")?$_POST['cidade']:"";
  $uf                = ($_POST['uf']!="")?$_POST['uf']:"";
  $cep               = ($_POST['cep']!="")?$_POST['cep']:"";
$dataRegistro       = $_POST['dataRegistro'];
$dsc         = $_POST['dsc'];
$medida         = isset($_POST['medida']) ? $_POST['medida'] : null;
$tam         = isset($_POST['tam']) ? $_POST['tam'] : null;
$refer         = $_POST['refer'];
$filiacao         = $_POST['filiacao'];
$cargo         = $_POST['cargo'];


$msg = "";


  include "../../security/database/connection.php";

  $sql = "SELECT * FROM clientes WHERE nome=:nome AND id<>:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':nome', $nome);
  $stm_sql->bindParam(':id', $id);
  $stm_sql->execute();

  if($stm_sql->rowCount()==0){
    $col = ["nome", "apelido", "cpf", "dataNascimento", "email", "fone", "celular", "rg", "dataRegistro", "dsc", "credito", "tam", "medida", "refer", "filiacao", "cargo", "uf", "cidade", "logradouro", "bairro", "complemento", "cep"];
    $sql = "UPDATE clientes SET ";
      foreach ($col as $key => $value) {
        $sql.= $value."=:".$value;
        if ($key + 1 !=  sizeof($col)){
          $sql.= ", ";
        }
      }
      $sql.= " WHERE id=:id";
      
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':id', $id);
      $stm_sql-> bindParam(':nome', $nome);
      $stm_sql-> bindParam(':cpf', $cpf);
      $stm_sql-> bindParam(':apelido', $apelido);
      $stm_sql-> bindParam(':dataNascimento', $dataNascimento);
      $stm_sql-> bindParam(':email', $email);
      $stm_sql-> bindParam(':fone', $fone);
      $stm_sql-> bindParam(':celular', $celular);
      $stm_sql-> bindParam(':rg', $rg);

      $stm_sql-> bindParam(':logradouro', $logradouro);
      $stm_sql-> bindParam(':complemento', $complemento);
      $stm_sql-> bindParam(':bairro', $bairro);
      $stm_sql-> bindParam(':cidade', $cidade);
      $stm_sql-> bindParam(':uf', $uf);
      $stm_sql-> bindParam(':cep', $cep);

      $stm_sql-> bindParam(':dataRegistro', $dataRegistro);
      $stm_sql-> bindParam(':dsc', $dsc);
      $stm_sql-> bindParam(':medida', $medida);
      $stm_sql-> bindParam(':tam', $tam);
      $stm_sql-> bindParam(':refer', $refer);
      $stm_sql-> bindParam(':filiacao', $filiacao);
      $stm_sql-> bindParam(':cargo', $cargo);
      $stm_sql-> bindParam(':credito', $credito);
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
  
echo $msg
?>

