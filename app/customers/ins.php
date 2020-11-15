<?php

  $nome               = $_POST['nome'];
  $apelido            = $_POST['apelido'];
  $cpf                = $_POST['cpf'];
  $dataNascimento     = $_POST['dataNascimento'];
  $email              = $_POST['email'];
  $fone           = $_POST['fone'];
  $celular            = $_POST['celular'];
  $rg                 = $_POST['rg'];
  $endereco = array();
  $endereco['logradouro']           = ($_POST['logradouro']!="")?$_POST['logradouro']:"";
  $endereco['complemento']        = ($_POST['complemento']!="")?$_POST['complemento']:"";
  $endereco['bairro']             = ($_POST['bairro']!="")?$_POST['bairro']:"";
  $endereco['municipio']          = ($_POST['municipio']!="")?$_POST['municipio']:"";
  $endereco['uf']                 = ($_POST['uf']!="")?$_POST['uf']:"";
  $endereco['cep']                = ($_POST['cep']!="")?$_POST['cep']:"";
  $endereco = serialize($endereco);
  $dataRegistro       = $_POST['dataRegistro'];
  $dsc         = $_POST['dsc'];
  $medida         = $_POST['medida'];
  $tam         = $_POST['tam'];
  $refer         = $_POST['refer'];
  $filiacao         = $_POST['filiacao'];
  $cargo         = $_POST['cargo'];

  $msg = "erro de programação";


    include "../../security/database/connection.php";
    $sql = "SELECT * FROM clientes WHERE nome=:nome";
    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':nome', $nome);
    $stm_sql -> execute();

    if ($stm_sql->rowCount()==0){
      $sql = "INSERT INTO clientes (id, nome, apelido, cpf, dataNascimento, email, fone, celular, rg, end, dataRegistro, dsc, medida, tam, refer, filiacao, cargo) VALUES (:id, :nome, :apelido, :cpf, :dataNascimento, :email, :fone, :celular, :rg, :end, :dataRegistro, :dsc, :medida, :tam, :refer, :filiacao, :cargo)";
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
      $stm_sql-> bindParam(':end', $endereco);
      $stm_sql-> bindParam(':dataRegistro', $dataRegistro);
      $stm_sql-> bindParam(':dsc', $dsc);
      $stm_sql-> bindParam(':medida', $medida);
      $stm_sql-> bindParam(':tam', $tam);
      $stm_sql-> bindParam(':refer', $refer);
      $stm_sql-> bindParam(':filiacao', $filiacao);
      $stm_sql-> bindParam(':cargo', $cargo);

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
?>
