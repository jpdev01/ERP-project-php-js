<?php
$id = $_GET['id'];
include "../../security/database/connection.php";

$sql = "SELECT * FROM clientes WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id); //quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql->execute();

$cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
$form_title = "ajax_form_upd";
include "form.php";
?>

<script type="text/javascript">
  $("#id").val("<?php echo $id; ?>");
  $("#nome").val("<?php echo $cliente['nome']; ?>");
  $("#apelido").val("<?php echo $cliente['apelido']; ?>");
  $("#rg").val("<?php echo $cliente['rg']; ?>");
  $("#dataNascimento").val("<?php echo $cliente['dataNascimento']; ?>");
  $("#cpf").val("<?php echo $cliente['cpf']; ?>");
  $("#tam").val("<?php echo $cliente['tam']; ?>");
  $("#medida").val("<?php echo $cliente['medida']; ?>");
  $("#email").val("<?php echo $cliente['email']; ?>");
  $("#fone").val("<?php echo $cliente['fone']; ?>");
  $("#celular").val("<?php echo $cliente['celular']; ?>");
  $("#uf").val("<?php echo $cliente['uf']; ?>");
  $("#cidade").val("<?php echo $cliente['cidade']; ?>");
  $("#bairro").val("<?php echo $cliente['bairro']; ?>");
  $("#logradouro").val("<?php echo $cliente['logradouro']; ?>");
  $("#complemento").val("<?php echo $cliente['complemento']; ?>");
  $("#cep").val("<?php echo $cliente['cep']; ?>");
  $("#referencia").val("<?php echo $cliente['refer']; ?>");
  $("#filiacao").val("<?php echo $cliente['filiacao']; ?>");
  $("#cargo").val("<?php echo $cliente['cargo']; ?>");
  $("#dataRegistro").val("<?php echo $cliente['dataRegistro']; ?>");
  $("#dsc").val("<?php echo $cliente['dsc']; ?>");
</script>