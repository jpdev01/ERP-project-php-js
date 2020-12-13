<?php
include "../../security/database/connection.php";
$inputGroupSize = "input-group-sm";
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $sql = "SELECT * FROM produtos WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':id', $id); //quero trocar o que tem no parâmetro id pelo que tem na variável $id
    $stm_sql->execute();

    $product = $stm_sql->fetch(PDO::FETCH_ASSOC);
}

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
        <div class="container mypagina shadow-sm p-4 mb-2">
            <form action="" method="post" id="<?php echo $form_title; ?>">
                <input type="number" class="form-control" name="id" id="id" value="" hidden>
                <div class="form-row">
                    <p class="border-bottom d-block w-100 text-black-50">Informações Básicas</p>
                    <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="" required>
                    </div>
                    <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control" required>
                            <?php
                            foreach ($categories as $category) {
                                $selected = '';
                                if ($product) {
                                    if ($category['id'] == $product['categorias_id']) {
                                        $selected = 'selected';
                                    }
                                }
                            ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo $selected; ?>><?php echo $category['nome']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
                        <label for="tamanho">Tamanho:</label>
                        <select id="tamanho" name='tamanho' class="form-control">
                            <option>P</option>
                            <option>M</option>
                            <option>G</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
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
                    <div class="form-group col-md-1,5 <?php echo $inputGroupSize; ?>">
                        <label for="genero">Gênero: </label>
                        <select id="genero" name='genero' class="form-control">
                            <option value="0" selected>Feminino</option>
                            <option value="1">Masculino</option>
                            <option value="2">Unissex</option>
                            <option>cor</option>
                        </select>
                    </div>
                    <div class="form-group <?php echo $inputGroupSize; ?>">
                        <label for="vlrVenda">Valor de venda:</label>
                        <input type="number" class="form-control" id="vlrVenda" name="valvd" placeholder="Valor de venda..." required>
                    </div>
                </div>
                <div class="form-row">
                    <p class="border-bottom d-block w-100 text-black-50">Classificação e origem</p>
                    <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
                        <label for="fornecedor">Fornecedor</label>
                        <select name="fornecedor" id="fornecedor" class="form-control" required>
                            <?php
                            foreach ($fornecedores as $fornecedor) {
                                $selected = "";
                                if ($product) {
                                    if ($fornecedor['id'] == $product['fornecedores_id']) {
                                        $selected = 'selected';
                                    }
                                }
                            ?>
                                <option value="<?php echo $fornecedor['id']; ?>" <?php echo $selected; ?>><?php echo $fornecedor['nome']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 <?php echo $inputGroupSize; ?>">
                        <label for="valpg">Valor pago:</label>
                        <input type="number" class="form-control" id="valpg" name="valpg" placeholder="Valor pago...">
                    </div>
                    <div class="form-group <?php echo $inputGroupSize; ?>">
                        <label for="datacompra">Data de registro:</label>
                        <input type="date" class="form-control" id="datacompra" name="datacompra" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col-md-4 <?php echo $inputGroupSize; ?>">
                        <label for="colecao">Coleção:</label>
                        <input type="text" class="form-control" name="colecao" id="colecao">
                    </div>
                    <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
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
                    <p class="border-bottom d-block w-100 text-black-50">Informações extras</p>
                    <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
                        <label for="dsc">Descrição:</label>
                        <input type="text" class="form-control" name="dsc" id="dsc">
                    </div>
                    <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
                        <label for="status">Status: </label>
                        <select id="status" name='status' class="form-control">
                            <option value="0" selected>Disponível</option>
                            <option value="1">Indisponível</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
                        <label for="estilo">Estilo:</label>
                        <input type="text" class="form-control" name="estilo" id="estilo">
                    </div>
                </div>
                <div class="form-row">
                    <p class="border-bottom d-block w-100 text-black-50">Código de barras</p>
                    <div class="form group col-md-3 <?php echo $inputGroupSize; ?>">
                        <!-- <label class="d-block w-100">Código de barras:</label> -->
                        <div class="form-check">
                            <input class="form-check-input checkCodeInputMode" type="radio" name="checkModeInputCode" id="checkCodeAuto" value="auto" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Gerar automaticamente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input checkCodeInputMode" type="radio" name="checkModeInputCode" id="checkCodeManual" value="manual">
                            <label class="form-check-label" for="exampleRadios2">
                                Manual
                            </label>
                        </div>
                    </div>
                    <div class="form group col-md-3 <?php echo $inputGroupSize; ?>">

                        <input id="inputCode" name="codeScanner" type="number" class="form-control bg-white is-valid" aria-label="codigo de barras" placeholder="Informe o código de barras do produto" onchange="changeInputCode()">
                        <div class="valid-feedback" visible="false">
                            Código Válido!
                        </div>
                        <div class="invalid-feedback">
                            Código Inválido!
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
        </div>

    <?php
    } else {
    ?>
        <script>
            window.location.href = 'main.php?file=error.php';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'main.php?file=error.php';
    </script>
<?php
}
?>


<?php
if ($product) {
?>

    <script type="text/javascript">
        $("#id").val("<?php echo $id; ?>");
        $("#nome").val("<?php echo $product['nome']; ?>");
        $("#tamanho").val("<?php echo $product['tam']; ?>");
        $("#tamanho").val("<?php echo $product['tam']; ?>");
        $("#vlrVenda").val("<?php echo $product['vlrVenda']; ?>");
        $("#valpg").val("<?php echo $product['vlrPago']; ?>");
        $("#dataRegistro").val("<?php echo $product['dataRegistro']; ?>");
        $("#dsc").val("<?php echo $product['dsc']; ?>");
        $("#inputCode").val("<?php echo $product['code']; ?>");
        $("#colecao").val("<?php echo $product['colecao']; ?>");
        $("#estilo").val("<?php echo $product['estilo']; ?>");
        $("#status").val("<?php echo $product['status']; ?>");
        $("#qtde").val("<?php echo $product['qtde']; ?>");
        $("#status").val("<?php echo $product['status']; ?>");
        $("#cor").val("<?php echo $product['cor']; ?>");
    </script>

<?php
} else {
?>
    <script type="text/javascript">
        $(document).ready(function() {
            defineCode("#inputCode");
        });
    </script>
<?php
}
?>