
<?php
$id = $_POST['id'];
include "../../security/database/connection.php";

$sql ="SELECT * FROM usuarios WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$user = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<form action="" method="post" id="ajax_form_upd">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="date" hidden class="form-control" name="dataativ" id="dataativ" value="<?php echo $user['dataAtiv'];?>">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="usuario">Usuário:</label>
      <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $user['usuario'];?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $user['senha'];?>">
    </div>
    <div class="col-md-6 mb-3">
      <label for="cpf">CPF:</label>
      <input type="number" class="form-control" name="cpf" id="cpf" value="<?php echo $user['cpf'];?>">
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="col-md-2">
      <label for="ativo">Status</label>
      <select class="custom-select" id="ativo" name="ativo">
        <?php
        $ativo = $user['ativo'];
        if ($ativo==0){
          ?>
          <option value="0" selected>Ativado</option>
          <option value="1">Desativado</option>
          <?php
        }else{
          ?>
          <option value="0">Ativado</option>
          <option value="1" selected>Desativado</option>
          <?php
        }

        ?>
      </select>
    </div>
    <div class="col-md-2 mb-3">
      <label for="permissao">Permissão:</label>
      <select class="custom-select" id="permissao" name="permissao">
        <?php
        $perm = $user['permissao'];
        if ($perm==0){
          ?>
          <option value="0" selected>Vendedor</option>
          <option value="1">Administrador</option>
          <?php
        }else{
          ?>
          <option value="0">Vendedor</option>
          <option value="1" selected>Administrador</option>
          <?php
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3 div-dt-userDes">
      <label for="datades">Data de desativação:</label>
      <input type="date" class="form-control" name="datades" id="datades" value="<?php echo $user['dataDes'];?>">
    </div><?php
    ?>
    <div class="col-md-6 mb-3">
      <label for="obs">Observação:</label>
      <input type="text" class="form-control" name="obs" id="obs" value="<?php echo $user['obs'];?>">
    </div>
  </div>
  <button class="btn btn-danger" type="reset">Limpar</button>
  <button class="btn btn-success" type="submit">Salvar</button>
</form>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script type="text/javascript" src="assets/js/filtros.js"></script>
