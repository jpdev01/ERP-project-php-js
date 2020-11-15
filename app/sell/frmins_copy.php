<!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script> -->
<?php
include "../../security/database/connection.php";
$codes = (isset($_COOKIE['codes'])) ? $_COOKIE['codes']: array();
$id_delivery   = isset($_POST['delivery']) ? $_POST['delivery'] : null;
if($id_delivery!=""){
  $sql = "SELECT d.*, c.nome AS nomecliente FROM delivery d INNER JOIN clientes c ON d.clientes_id = c.id WHERE d.id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id_delivery);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $d = $stm_sql->fetch(PDO::FETCH_ASSOC);
  $cliente = $d['nomecliente'];
  $codes = $d['produtos'];
  setcookie('codes', $codes, null, '/');
  $codes=unserialize($codes);

  foreach ($codes as $code) {
    $sql = "SELECT qtde, status FROM produtos WHERE code=:code";

    $stm_sql = $db_connection-> prepare($sql);
    $stm_sql -> bindParam(':code', $code);
    $stm_sql -> execute();
    $product = $stm_sql->fetch(PDO::FETCH_ASSOC);
    $qtde = $product['qtde'];
    $qtde++;
    $status=0;
    $sql = "UPDATE produtos SET qtde=:qtde, status=:status WHERE code=:code"; //atualiza os dados dos produtos comprados
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':code', $code);
    $stm_sql-> bindParam(':qtde', $qtde);
    $stm_sql-> bindParam(':status', $status);
    $result = $stm_sql->execute();
  }
  $sql = "DELETE FROM delivery WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql-> bindParam(':id', $id_delivery);
  $result = $stm_sql->execute();
}


?>


<div class="col-12">
  <div class="row">
    <div class="col-6">

      <form action="" method="post" id="ajax_form_scan" class="">
        <div class="input-group mb-3">
          <input type="text" name="scannercode" id="code" class="form-control" placeholder="Código de barras do produto...">
          <div class="input-group-prepend">
            <div class="input-group-text bg-light">
              <input type="radio" class='box-mode' id="box-scannercode" value="0" name="mode_code" checked>
              <img src="assets/css/bootstrap-icons-1.0.0/camera-video.svg" alt="" width="18" height="18" title="usar leitor">
            </div>
            <div class="input-group-text bg-light">
              <input type="radio" value="1" class='box-mode' name="mode_code">
              <img src="assets/css/bootstrap-icons-1.0.0/keyboard.svg" alt="" width="18" height="18" title="usar teclado">
            </div>
          </div>
        </div>
      </form>
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container p-2">
        <div class="table-responsive">
          <table class='table'>
            <thead class='thead-light'>
              <tr>
                <th scope='col'>Código de Barras</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Categoria</th>
                <th scope='col'>Preço</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="products">
            </tbody>
          </table>
        </div>
      </div>
      <h5 id="vartotal"></h5>
    </div>
    <div class="col-6">
      <p class="border-bottom"><strong>Cliente</strong> <button type="button" class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Selecionar cliente</button></p>
      <!-- <div class="form-group col-md">

      </div> -->
      <div class="form-group col-md-6">
        <?php
        if (!isset($d)){
          ?>
          <input type="text" id="cliente" name="cliente" class="form-control" value="<?php echo $d['clientes_id']; ?>" hidden>
          <input type="text" id="nomeCliente" name="nomeCliente" class="form-control" value="<?php echo $d['nomecliente']; ?>" hidden>
          <label id="labelCliente"><?php echo $d['nomecliente']; ?></label>
          <?php
        }else{
          ?>
          <input type="text" id="cliente" name="cliente" class="form-control" hidden>
          <input type="text" id="nomeCliente" name="nomeCliente" class="form-control" hidden>
          <label id="labelCliente"></label>
          <?php
        }
         ?>

      </div>
      <hr>
      <form action="" method="post" id="ajax_form">
        <div class="form-row">
          <div class="form-group col-md-6 venda">
            <label for="frmpgto">Forma de Pagamento:</label>
            <select class="form-control" id="frmpgto" name="frmpgto" required>
              <option value="0">Dinheiro</option>
              <option value="1">Cartão de crédito</option>
              <option value="2">Cartão de débito</option>
              <option value="3">Cheque</option>
              <option value="4">Crediário</option>
              <option value="5">Depósito / transferência</option>
            </select>
          </div>
          <div class="form-group col-6 venda">
            <label for="metPgto">Método de Pagamento:</label>
            <select class="form-control" id="metPgto" name="metPgto" required>
              <option value="0">A vista</option>
              <option value="1">Prazo</option>
            </select>
          </div>
        </div>
        <!-- <div class="form-row">
          <div class="form-group col-md">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Selecionar cliente</button>
          </div>
          <div class="form-group col-md-6">
            <input type="text" id="cliente" name="cliente" class="form-control" hidden>
            <input type="text" id="nomeCliente" name="nomeCliente" class="form-control" hidden>
            <label id="labelCliente"></label>
          </div>
        </div> -->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="date">Data:</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="<?php date_default_timezone_set('America/Sao_Paulo');
            echo Date('Y-m-d\TH:i',time()); ?>">
          </div>
          <div class="form-group col-md-4" id='cmp_parc'>
            <label for="qtdeparc">Qdte de Parcelas:</label>
            <input type="number" name="qtdeparc" id="qtdeparc" placeholder="qtde de parcelas..." value="" min="1" max="12" class="form-control">
          </div>
          <div class="form-group col-md-4" id='cmp_entrada'>
            <label for="entrada">Valor de entrada:</label>
            <input type="number" name="entrada" id="entrada" placeholder="valor pago" value="" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <div class="form-check venda">
              <input class="form-check-input" type="checkbox" id="descCheck">
              <label class="form-check-label" for="descCheck">Aplicar desconto</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="condCheck">
              <label class="form-check-label" for="CondCheck">Venda Condicional</label>
            </div>
          </div>
          <div class="form-group col-md-4" id='cmp_desc'>
            <label for="desc">Desconto:</label>
            <input type="number" name="desc" id="desc" value="0" placeholder="Insira o valor de desconto" class="form-control">
          </div>
          <div class="form-group col-md-4">
            <label id='varfinal' class='venda'></label>
          </div>
        </div>
        <button type="reset" id="e_compra" class="btn btn-danger">Cancelar</button>
        <button type="submit" class="btn btn-success">Confirmar</button>
      </form>
    </div>
  </div>
</div>


<?php
include "app/customers/modal.php";
?>
<!-- </div> -->
<!-- </div> -->

<!-- <script type="text/javascript" src="assets/js/sell.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script type="text/javascript" src="assets/imports/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/scroll.js"></script> -->
