<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<?php

$id = $_GET['id'];
include "../../security/database/connection.php";

$sql ="SELECT * FROM produtos WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$product = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>
<div class="container mypagina shadow-sm p-4">
<form action="" method="post" id="ajax_form_upd">
  <input type="number" class="" name='id' value="<?php echo $id; ?>" hidden>
  <div class="form-row" action="" method="post" id="ajax_form">
    <div class="form-group col-md-5">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name='nome' id="nome" value="<?php echo $product['nome']; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="categoria">Categoria</label>
      <select id="categoria" name='categoria' class="form-control">
        <?php
        $sql ="SELECT id, nome FROM categorias";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql-> execute();
        $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($categories as $category){
          $selected='';
          if($category['id']==$product['categorias_id']){
            $selected='selected';
          }
          ?><option value="<?php echo $category['id']; ?>" <?php echo $selected;?> ><?php echo $category['nome'];?></option><?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="tamanho">Tamanho</label>
      <select id="tamanho" name='tamanho' class="form-control" value="<?php echo $product['tam'];?>">
        <option value='P'>P</option>
        <option value='M'>M</option>
        <option value='G'>G</option>
      </select>
    </div>
  </div>
  <div class="form-row" action="" method="post" id="ajax_form">
    <div class="form-group col-md-4">
      <label for="vlrVenda">Valor de venda:</label>
      <input type="number" class="form-control" name='valvd' id="vlrVenda" value="<?php echo $product['vlrVenda'];?>">
    </div>
    <div class="form-group col-md-2">
      <label for="fornec">Fornecedor</label>
      <select id="fornec" name='fornecedor' class="form-control">
        <?php
        $sql ="SELECT id, nome FROM fornecedores";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql-> execute();
        $fornecedores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($fornecedores as $fornecedor){
          $selected='';
          if($category['id']==$product['categorias_id']){
            $selected='selected';
          }
          ?><option value="<?php echo $fornecedor['id']; ?>" <?php echo $selected;?>><?php echo $fornecedor['nome'];?></option><?php
        }
        ?>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="genero">Gênero:</label>
      <select id="genero" name='genero' class="form-control" value="<?php echo $product['genero'];?>">
        <option value="0">Feminino</option>
        <option value="1">Masculino</option>
        <option value="2">Unissex</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="status">Status:</label>
      <select class="form-control" id="status" name='status' value="<?php echo $product['status'];?>">
        <option value="0">Disponível</option>
        <option value="1">Indisponível</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="qtde">Quantidade:</label>
      <input type="number" class="form-control" id="qtde" name='qtde' value="<?php echo $product['qtde'];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="estilo">Estilo:</label>
      <input type="text" class="form-control" id="estilo" name='estilo' value="<?php echo $product['estilo'];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="colecao">Coleção:</label>
      <input type="text" class="form-control" id="colecao" name='colecao' value="<?php echo $product['colecao'];?>">
    </div>
    <div class="form-group col-md-2">
      <label for="cor">Cor:</label>
      <select id="cor" name='cor' class="form-control" value="<?php echo $product['cor'];?>">
        <option value='Amarelo'>Amarelo</option>
        <option value='Azul'>Azul</option>
        <option value='Bege'>Bege</option>
        <option value='Bordô'>Bordô</option>
        <option value='Branco'>Branco</option>
        <option value='Cáqui'>Cáqui</option>
        <option value='Cinza'>Cinza</option>
        <option value='Creme'>Creme</option>
        <option value='Dourado'>Dourado</option>
        <option value='Laranja'>Laranja</option>
        <option value='Lilás'>Lilás</option>
        <option value='Marrom'>Marrom</option>
        <option value='Prata'>Prata</option>
        <option value='Preto'>Preto</option>
        <option value='Rosa'>Rosa</option>
        <option value='Rosê'>Rosê</option>
        <option value='Roxo'>Roxo</option>
        <option value='Verde'>Verde</option>
        <option value='Vermelho'>Vermelho</option>
      </select>
    </div>
  </div>
  <div class='form-row'>
    <div class="form-group col-md-4">
      <label for="vlrPago">Valor pago:</label>
      <input type="number" class="form-control" id="vlrPago" name='vlrPago' value="<?php echo $product['vlrPago'];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="dataRegistro">Data de registro:</label>
      <input type="date" class="form-control" id="dataRegistro" name='dataCompra' value="<?php echo $product['dataRegistro'];?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="dsc">Descrição: </label>
      <input type="text" class="form-control" name='dsc' id="dsc" value="<?php echo $product['dsc'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="code-scan">Código de barras: </label>
      <input type="text" class="form-control" name='codeScanner' id="code-scan" value="<?php echo $product['code'];?>">
    </div>
  </div>
  <button type="submit" class="btn btn-danger">Cancelar</button>
  <button type="submit" class="btn btn-success">Salvar</button>
</form>
</div>
