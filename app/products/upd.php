<?php
  $id           = $_POST['id'];
  $nome              = $_POST['nome'];
  $categ         = $_POST['categoria'];
  $vlrVenda              = ($_POST['valvd']!="")?$_POST['valvd']:null;
  $dsc               = ($_POST['dsc']!="")?$_POST['dsc']:null;
  $fornec        = $_POST['fornecedor'];
  $status            = $_POST['status'];
  $cor               = ($_POST['cor']!="")?$_POST['cor']:null;
  $genero            = $_POST['genero'];
  $estilo            = ($_POST['estilo']!="")?$_POST['estilo']:null;
  $tam           = ($_POST['tamanho']!="")?$_POST['tamanho']:null;
  $dataCompra        = $_POST['dataCompra'];
  $qtde              = $_POST['qtde'];
  $vlrPago             = ($_POST['vlrPago']!="")?$_POST['vlrPago']:0;
  $colecao           = ($_POST['colecao']!="")?$_POST['colecao']:null;
  $dataVenda         = null;
  $code               = $_POST['codeScanner'];
  $imagem = null;
  // $imagem            = $_POST['imagem'];

  $msg = "erro de programação";


    include "../../security/database/connection.php"; //a função include importa um outro arquivo PHP
    /*função include()
    include(): inclui o arquivo passado como parâmetro. Se o arquivo não for encontrado, o PHP irá lançar um "warning", mas dará continuidade na execução.*/

    $sql = "SELECT * FROM produtos WHERE (nome=:nome OR code=:code) AND id<>:id";

    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':id', $id);
    $stm_sql -> bindParam(':nome', $nome);
    $stm_sql -> bindParam(':code', $code);
    $stm_sql -> execute();

    if ($stm_sql->rowCount()==0){
      // - inicio cadastro (inserir) do usuario -- //
      $sql = "UPDATE produtos SET nome=:nome, vlrVenda=:vlrVenda, dsc=:dsc, fornecedores_id=:fornec, status=:status, cor=:cor, genero=:genero, qtde=:qtde, estilo=:estilo, tam=:tam, vlrPago=:vlrPago, colecao=:colecao, code=:code, categorias_id=:categ, dataCompra=:dataCompra WHERE id=:id";



      $stm_sql = $db_connection-> prepare ($sql);

      $stm_sql-> bindParam(':id', $id);
      $stm_sql-> bindParam(':nome', $nome);
      $stm_sql-> bindParam(':categ', $categ);
      $stm_sql-> bindParam(':vlrVenda', $vlrVenda);
      $stm_sql-> bindParam(':dsc', $dsc);
      $stm_sql-> bindParam(':fornec', $fornec);
      $stm_sql-> bindParam(':status', $status);
      $stm_sql-> bindParam(':cor', $cor);
      $stm_sql-> bindParam(':genero', $genero);
      $stm_sql-> bindParam(':dataCompra', $dataCompra);
      // $stm_sql-> bindParam(':dataVenda', $dataVenda);
      $stm_sql-> bindParam(':qtde', $qtde);
      $stm_sql-> bindParam(':estilo', $estilo);
      // $stm_sql-> bindParam(':imagem', $imagem);
      $stm_sql-> bindParam(':tam', $tam);
      $stm_sql-> bindParam(':vlrPago', $vlrPago);
      $stm_sql-> bindParam(':colecao', $colecao);
      $stm_sql-> bindParam(':code', $code);





      $result = $stm_sql->execute();

      if($result){
        $msg = "Alteração efetuada com sucesso!";
      }else{
        $msg = "Falha ao alterar!";
      }
      // -- fim cadastro (inserir) do usuario -- //
  }
  else{
    $msg= "Esse produto já está cadastrado no banco de dados.";
  }
  echo $msg;
?>
