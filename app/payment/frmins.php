<?php
$idcliente = isset($_GET['idcliente']) ? $_GET['idcliente'] : '';
$nomecliente = isset($_GET['nomecliente']) ? $_GET['nomecliente'] : '';
$idvenda = isset($_GET['idvenda']) ? $_GET['idvenda'] : '';
$view = isset($_GET['view']) ? $_GET['view'] : 'list';
?>
<div class="col-12">
  <div class="row">
    <div class="col-8">
      <h5 class="d-inline">Compras</h5>
      <button type="button" class="btn btn-outline-light"><a class="text-muted" href="main.php?folder=app/payment/&file=future_payments.php">Visualizar futuras entradas</a></button>
    </div>
    <div class="col-4">
      <h5>Registrar pagamento</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <div class="form-group">
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Selecionar cliente</button>
        <strong style="display: inline-block">Cliente:</strong>
        <p style="display: inline-block" name="cliente" id="labelCliente">
      </p>
      </div>
      <input id="view" value="list" hidden>

      <table class='table table-striped table-sm' id="table">
        <thead class='thead-dark'>
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Valor total</th>
            <th scope="col">Parcelas</th>
            <th scope="col">Desconto</th>
            <th scope="col">Valor pago</th>
            <th scope="col"><div class="custom-control custom-checkbox custom-select-sm">
              <input type="checkbox" class="custom-control-input bd-danger" id="check-sell-pendente">
              <label class="custom-control-label" for="check-sell-pendente">Pendente</label>
            </div></th>
          </tr>
        </thead>
        <tbody id='pend-customer-table'>
        </tbody>
      </table>
      <div id="pend-customer-grid">
      </div>
    </div>
    <div class="col-4">
      <div id='venda-dados'></div>
    </div>
  </div>
</div>
<?php
include "app/customers/modal.php";
if ($idcliente){
  ?>
  <script>
    window.onload = function () {
      setTimeout(function(){ 
        select_cliente(<?php echo $idcliente?>, '<?php echo $nomecliente?>');
      select_venda(<?php echo $idvenda; ?>);
      
      }, 500);
      
      } 
</script>
  <?php
}
?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script> -->
