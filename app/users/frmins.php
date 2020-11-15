
<form action="" method="post" id="ajax_form">
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="usuario">Usuário:</label>
      <input type="text" class="form-control" name="usuario" id="usuario" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" name="senha" id="senha" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="cpf">CPF:</label>
      <input type="text" class="form-control" name="cpf" id="cpf">
    </div>
    <div class="col-md-4 mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="col-md-2 mb-3">
      <label for="permissao">Permissão:</label>
      <select class="custom-select" name="permissao" id="permissao">
        <option value="0" selected>Vendedor</option>
        <option value="1">Administrador</option>
      </select>
    </div>
    <div class="col-md-2 mb-3">
      <label for="ativo">Status:</label>
      <select class="custom-select" name="ativo" id="ativo">
        <option value="0" selected>Ativado</option>
        <option value="1">Desativado</option>
      </select>
    </div>
  </div>
  <div class='form-row'>
    <div class="col-md-6 mb-3">
      <label for="obs">Observação:</label>
      <input type="text" class="form-control" name="obs" id="obs">
    </div>
    <div class="col-md-2 mb-3">
      <label for="dataAtiv">Data de ativação:</label>
      <input type="date" class="form-control" name="dataAtiv" id="dataAtiv" value="<?php echo date('Y-m-d');?>">
    </div>
    <div class="col-md-2 mb-3 div-dt-userDes">
      <label for="dataDes">Data de desativação:</label>
      <input type="date" class="form-control" name="dataDes" id="dataDes">
    </div>
  </div>
  <button class="btn btn-danger" type="submit">Limpar</button>
  <button class="btn btn-success" type="submit">Salvar</button>
</form>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script type="text/javascript" src="assets/js/filtros.js"></script>
