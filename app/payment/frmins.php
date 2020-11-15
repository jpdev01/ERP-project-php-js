
<div class="col-12">
  <div class="row">
    <div class="col-8">
      <h2>Compras</h2>
    </div>
    <div class="col-4">
      <h2>Registrar pagamento</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <div class="form-group">
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Selecionar cliente</button>
        <strong style="display: inline-block">Cliente:</strong><p style="display: inline-block" name="cliente" id="labelCliente"></p>
      </div>

      <table class='table table-striped table-sm'>
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
        <tbody id='pend-cliente'>
        </tbody>
      </table>
    </div>
    <div class="col-4">
      <div id='venda-dados'></div>
    </div>
  </div>
</div>
<?php
include "app/customers/modal.php";
?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script> -->
