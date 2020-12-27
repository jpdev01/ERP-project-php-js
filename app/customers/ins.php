<?php

  $nome               = $_POST['nome']; //
  $apelido            = $_POST['apelido']; //
  $cpf                = $_POST['cpf']; //
  $rg                 = $_POST['rg'];//
  $dataNascimento     = $_POST['dataNascimento']; //

  $email              = $_POST['email'];//
  $fone           = $_POST['fone'];//
  $celular            = $_POST['celular'];//

  $logradouro          = ($_POST['logradouro']!="")?$_POST['logradouro']:"";
  $complemento         = ($_POST['complemento']!="")?$_POST['complemento']:"";
  $bairro            = ($_POST['bairro']!="")?$_POST['bairro']:"";
  $cidade            = ($_POST['cidade']!="")?$_POST['cidade']:"";
  $uf                = ($_POST['uf']!="")?$_POST['uf']:"";
  $cep               = ($_POST['cep']!="")?$_POST['cep']:"";
  $dataRegistro       = $_POST['dataRegistro'];//
  $dsc                = $_POST['dsc'];
  $medida         = $_POST['medida'];
  $tam             = $_POST['tam'];
  $refer         = $_POST['refer'];
  $filiacao         = $_POST['filiacao'];
  $cargo         = $_POST['cargo'];
  $credito         = null;

  $FamilyFather = isset($_POST['FamilyFather']) ? $_POST['FamilyFather'] : null;
  $FamilyMother = isset($_POST['FamilyMother']) ? $_POST['FamilyMother'] : null;
  $FamilyGrant = isset($_POST['FamilyGrant']) ? $_POST['FamilyGrant'] : null;
  $FamilySis = isset($_POST['FamilySis']) ? $_POST['FamilySis'] : null;
  $FamilySon = isset($_POST['FamilySon']) ? $_POST['FamilySon'] : null;
  $FamilyOuthers = isset($_POST['FamilyOuthers']) ? $_POST['FamilyOuthers'] : null;

  $msg = "erro de programação";


    include "../../security/database/connection.php";
    $sql = "SELECT * FROM clientes WHERE nome=:nome";
    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':nome', $nome);
    $stm_sql -> execute();

    if ($stm_sql->rowCount()==0){

      $col = ["id", "nome", "apelido", "cpf", "dataNascimento", "email", "fone", "celular", "rg", "dataRegistro", "dsc", "credito", "tam", "medida", "refer", "filiacao", "cargo", "uf", "cidade", "logradouro", "bairro", "complemento", "cep", "pai", "mae", "filho", "avo", "irmao", "outros"];

      $sql = "INSERT INTO clientes (";
      foreach ($col as $key => $value) {
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

      $stm_sql-> bindParam(':pai', $pai);
      $stm_sql-> bindParam(':mae', $mae);
      $stm_sql-> bindParam(':avo', $avo);
      $stm_sql-> bindParam(':filho', $filho);
      $stm_sql-> bindParam(':irmao', $irmao);
      $stm_sql-> bindParam(':outros', $outros);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
      }else{
        $msg = "Falha ao cadastrar!";
      }
  }
  else{
    $msg= "Esse cliente já está cadastrado no banco de dados.";
  }
  echo $msg;

  $table = "clientes";
  $type = "insert";
  $name = $nome;
  include "../action/ins.php";
?>
