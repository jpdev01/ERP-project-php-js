<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<?php

$id = $_POST['id'];
include "../../security/database/connection.php";

$sql ="SELECT * FROM fornecedores WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$fornecedor = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<form action="" method="post" id="ajax_form_upd">
  <input type="number" class="form-control" name="id" value="<?php echo $id; ?>" hidden>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $fornecedor['nome']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="tel">Telefone:</label>
      <input type="number" class="form-control" name="tel" id="tel" value="<?php echo $fornecedor['tel']; ?>">
    </div>
  </div>
  <div class='form-row'>
    <div class="form-group col-md-6">
      <label for="obs">Observação:</label>
      <input type="text" class="form-control" id="obs" name="obs" placeholder="Observação ou descrição" value="<?php echo $fornecedor['obs']; ?>">
    </div>
  </div>
  <button type="reset" class="btn btn-danger">Apagar</button>
  <button type="submit" class="btn btn-success">Salvar</button>
</form>
