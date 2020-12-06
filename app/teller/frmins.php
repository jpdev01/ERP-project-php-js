
<!-- <div class='container-fluid'> -->
<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Inserir</h2>
    </div>
    <div class="col-6">
      <h2>Movimentação do caixa</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <form action="" method="post" id="ajax_form">
        <div class="form-row">
          <div class="form-group col-md-5">
            <label for="data">Data:</label>
            <input type='datetime-local' name='data' id='data' class="form-control" value="<?php date_default_timezone_set('America/Sao_Paulo');
            echo Date('Y-m-d\TH:i',time()) ?>">
          </div>
          <div class="form-group col-md">
            <label for="tipo">Tipo:</label>
            <select class="form-control" id="tipo" name='tipo'>
              <option value="0">Entrada</option>
              <option value="1">Saída</option>
            </select>
          </div>
          <div class="form-group">
            <label for="obs">Descrição</label>
            <input type="text" class="form-control" id="obs" name='obs'>
          </div>
        </div>
        <div class='form-group'>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Valor:</span>
              <span class="input-group-text">R$</span>
            </div>
            <input type="number" class="form-control" name='vlr' id='vlr' required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-success">Inserir</button>
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-danger">Limpar</button>
          </div>
        </div>
      </form>
      <div class="card w-75 bg-success">
        <div class="card-body">
          <h5 class="card-title">STATUS DO CAIXA</h5>
          <p class="card-text" id='status-caixa'>R$
            <?php
            $caixa = isset($_COOKIE['status_caixa']) ? $_COOKIE['status_caixa'] : 0;
            echo $caixa;

            ?>
          </p>
          <!-- <a href="#" class="btn btn-primary">Button</a> -->
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
              </tr>
            </thead>
            <tbody id='see-caixa'></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
-->