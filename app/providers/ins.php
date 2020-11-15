<?php

  $nome               = $_POST['nome'];
  $tel                = $_POST['tel'];
  $obs         = $_POST['obs'];

  $msg = "erro de programação";


    include "../../security/database/connection.php"; //a função include importa um outro arquivo PHP
    /*função include()
    include(): inclui o arquivo passado como parâmetro. Se o arquivo não for encontrado, o PHP irá lançar um "warning", mas dará continuidade na execução.*/

    $sql = "SELECT * FROM fornecedores WHERE nome=:nome";

    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':nome', $nome);
    $stm_sql -> execute();

    if ($stm_sql->rowCount()==0){

      // - inicio cadastro (inserir) do usuario -- //
      $sql = "INSERT INTO fornecedores (id, nome, tel, obs) VALUES (:id, :nome, :tel, :obs)";//DBO= PARAMETROS (SGBD:LOCAL HOST QUE ESTA ARMAZENANDO ESSE SGBD; NOME DO BANCO DE DADOS DENTRO DO HOST Q VAMOS EXECUTAR, CONJUNTO DE CARACTERES PARA EXECUTAR ESSA CONEXAO) , "PROXIMOS PARAMETROS" ==> 1-USUARIO

      //$sql = "INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf`, `datanascimento`, `email`, `telefone`, `celular`, `rg`, `endereço`, `complemento`, `bairro`, `municipio`, `estado`, `cep`, `dataregistro`, `observacao`) VALUES (NULL, 'antonio', '4294967295', '2020-07-08', 'neusatru@gmail.com', '4734250261', '47999087474', '6574103', 'r donaeok', 'bloco b2 apto 301', 'sss', 'joinville', 'sc', NULL, '2020-07-08', 'nenhuma')";

      $stm_sql = $db_connection-> prepare ($sql);

      $id = null;

      $stm_sql-> bindParam(':id', $id);
      $stm_sql-> bindParam(':nome', $nome);
      $stm_sql-> bindParam(':tel', $tel);
      $stm_sql-> bindParam(':obs', $obs);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
      }else{
        $msg = "Falha ao cadastrar!";
      }
      // -- fim cadastro (inserir) do usuario -- //
  }
  else{
    $msg= "Esse fornecedor já está cadastrado no banco de dados.";
  }
  echo $msg;

?>
