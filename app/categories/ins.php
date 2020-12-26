
<?php
$id = null;
$nome              = $_POST['nome'];
$dsc              = $_POST['desc'];


$msg = "erro de programação";


include "../../security/database/connection.php";

$sql = "SELECT * FROM categorias WHERE nome=:nome";

$stm_sql = $db_connection-> prepare($sql);
$stm_sql -> bindParam(':nome', $nome);
$stm_sql -> execute();

if ($stm_sql->rowCount()==0){

  // - inicio cadastro (inserir) do usuario -- //
  $sql = "INSERT INTO categorias (id, nome, dsc) VALUES (:id, :nome, :dsc)";

  $stm_sql = $db_connection-> prepare ($sql);

  $stm_sql-> bindParam(':id', $id);
  $stm_sql-> bindParam(':nome', $nome);
  $stm_sql-> bindParam(':dsc', $dsc);



  $result = $stm_sql->execute();

  if($result){
    $msg = "Categoria " .$nome ." cadastrada com sucesso!";
    $params = [
      'type' => 'insert',
      'name' => 'nova categoria: '.$nome,
      'table_afected' => 'categories',
      'id_afected' => null,
      'date' => date("Y-m-d"),
      'hour' => date("H:i:s")
    ];
    newActionDatabase($params);
  }else{
    $msg = "Falha ao cadastrar!";
  }
  // -- fim cadastro (inserir) do usuario -- //
}
else{
  $msg= "Essa categoria já está cadastrada no banco de dados.";
}

include "../action/ins.php";
$params = [
  'type' => 'insert',
  'name' => 'nova categoria: '.$nome,
  'table_afected' => 'categories',
  'id_afected' => null,
  'date' => date("Y-m-d"),
  'hour' => date("H:i:s")
];
echo $msg;
?>
