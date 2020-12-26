
<?php
$id = $_POST['id'];
$nome              = $_POST['nome'];
$dsc              = $_POST['desc'];


$msg = "erro de programação";


include "../../security/database/connection.php";

$sql = "SELECT * FROM categorias WHERE nome=:nome AND id<>:id";

$stm_sql = $db_connection-> prepare($sql);
$stm_sql -> bindParam(':nome', $nome);
$stm_sql -> bindParam(':id', $id);
$stm_sql -> execute();

if ($stm_sql->rowCount()==0){

  // - inicio cadastro (inserir) do usuario -- //
  $sql = "UPDATE categorias SET nome=:nome, dsc=:dsc WHERE id=:id";

  $stm_sql = $db_connection-> prepare ($sql);

  $stm_sql-> bindParam(':id', $id);
  $stm_sql-> bindParam(':nome', $nome);
  $stm_sql-> bindParam(':dsc', $dsc);



  $result = $stm_sql->execute();

  if($result){
    $msg = "Categoria ".$nome." alterada com sucesso!";
  }else{
    $msg = "Falha ao cadastrar!";
  }
  // -- fim cadastro (inserir) do usuario -- //
}
else{
  $msg= "Essa categoria já está cadastrada no banco de dados.";
}
echo $msg;

?>
