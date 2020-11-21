<?php
include "../../security/database/connection.php";
$sql = "SELECT id, nome from categorias ORDER by nome ASC";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->execute();
$categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
if ($stm_sql->rowCount() != 0) {
  include "../../security/database/connection.php";
  $sql = "SELECT id, nome from fornecedores ORDER by nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->execute();
  $fornecedores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  if ($stm_sql->rowCount() != 0) {
?>

<form action="" method="post" id="ajax_form">
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="form-group col-md-2">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control" required>
                <?php
                foreach ($categories as $category) {
                    $id = $category['id'];
                ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['nome']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="tamanho">Tamanho:</label>
            <select id="tamanho" name='tamanho' class="form-control">
                <option>P</option>
                <option>M</option>
                <option>G</option>
            </select>
        </div>
        <div class="form-group col-md-1">
            <label for="cor">Cor: </label>
            <select id="cor" name='cor' class="form-control">
                <option selected>...</option>
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
        <div class="form-group col-md-1,5">
            <label for="genero">Gênero: </label>
            <select id="genero" name='genero' class="form-control">
                <option value="0" selected>Feminino</option>
                <option value="1">Masculino</option>
                <option value="2">Unissex</option>
                <option>cor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="valvd">Valor de venda:</label>
            <input type="number" class="form-control" id="valvd" name="valvd" placeholder="Valor de venda..." required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <label for="fornecedor">Fornecedor</label>
            <select name="fornecedor" id="fornecedor" class="form-control" required>
                <?php
                foreach ($fornecedores as $fornecedor) {
                ?>
                    <option value="<?php echo $fornecedor['id']; ?>"><?php echo $fornecedor['nome']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="valpg">Valor pago:</label>
            <input type="number" class="form-control" id="valpg" name="valpg" placeholder="Valor pago...">
        </div>
        <div class="form-group">
            <label for="datacompra">Data de registro:</label>
            <input type="date" class="form-control" id="datacompra" name="datacompra" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="colecao">Coleção:</label>
            <input type="text" class="form-control" name="colecao" id="colecao">
        </div>
        <div class="form-group col-md-1">
            <label for="qtde">Quantidade: </label>
            <select id="qtde" name='qtde' class="form-control" required>
                <option value="1" selected>1</option>
                <?php
                for ($i = 2; $i <= 12; $i++) {
                ?><option value=<?php echo $i; ?>><?php echo $i ?></option><?php
                                                                        }
                                                                            ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="dsc">Descrição:</label>
            <input type="text" class="form-control" name="dsc" id="dsc">
        </div>
        <div class="form-group col-md-1">
            <label for="status">Status: </label>
            <select id="status" name='status' class="form-control">
                <option value="0" selected>Disponível</option>
                <option value="1">Indisponível</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="estilo">Estilo:</label>
            <input type="text" class="form-control" name="estilo" id="estilo">
        </div>
    </div>
    <div class="form-row">
        <div class="col container-fluid">
            <h6 class="d-block w-100">Código de Barras</h6>


            <div class="input-group mb-3 col-md">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input id="checkInputCode" type="checkbox" aria-label="Checkbox for following text input mr-2">Criar
                    </div>
                </div>
                <input id="inputCode" name="codeScanner" type="number" class="form-control bg-white" aria-label="codigo de barras" placeholder="Informe o código de barras do produto">
            </div>
        </div>
        <div class="col" id="divCode">
            <div class="float-right d-block" onclick="printCode('#barcode')">
                <svg id="barcode"></svg>
            </div>
        </div>

    </div>
    <button type="reset" class="btn btn-danger">Apagar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>

<?php
  } else {
    $msg = "Nenhum fornecedor encontrado!";
  }
} else {
  $msg = "Nenhuma categoria cadastrada!";
}
?>