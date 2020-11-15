<?php
include 'security/database/connection.php';
$sql = "SELECT id FROM vendas";
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> execute();
$vendas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
if ($stm_sql->rowCount()!=0){
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sugar/1.4.1/sugar.min.js"></script>
  <script type="text/javascript" src="assets/js/dbfunctions.js"></script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script> -->
  <div class="col-12">
    <div class="row">


      <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Gráficos</h1>
          <div class="btn-toolbar mb-3 mb-md-0">
            <div class="btn-group">
              <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
              <select class="form-control btn-sm btn-outline-secondary mr-2" id="g-01">
                <option value="0">...</option>
                <option value="1">Número de vendas</option>
                <option value="2">Relatório de vendas por categoria</option>
                <option value="3">Relatório de vendas por fornecedor</option>
                <option value="4">Relatório por formas de pagamento</option>
                <option value="5">Produtos disponíveis por categoria</option>
                <option value="6">Produtos disponíveis por fornecedor</option>
              </select>
            </div>

            <div class="btn-group">
              <select class="form-control btn-sm btn-outline-secondary mr-2" id="periodo">
                <option value="1">Semanal</option>
                <option value="2">Mensal</option>
                <option value="3">Anual</option>
              </select>
            </div>
            <div class="btn-group">

              <button type="button" class="btn btn-sm btn-outline-secondary" id='print'>Imprimir</button>
            </div>
          </div>
        </div>
        <div class="row mt-3 d-inline-block container">
          <!-- <canvas class="line-chart" id="myChart" width="900" height="380"></canvas> -->
          <div class="chart-container col-12">
            <canvas id='canvas_joaoBorba' class="line-chart"  width="900" height="380" name='canvas'></canvas>
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> -->
        <script src="assets/js/graphics.js"></script>
        <script src="assets/js/dash.js"></script>

      </main>

    </div>
    <div class="row">
      <!-- <main> -->
        <div class="container-fluid">
          <h1 class="mt-4">Mais documentos</h1>
          <div class="row">
            <div class="card m-4">
              <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Planilha de vendas
              </div>
              <div class="card-body" onclick="plan_vendas()">
              </div>
              <div class="card-footer small text-muted"><a href="" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Gerar excel</a> / <a>Imprimir</a></div>
            </div>

            <div class="card m-4">
              <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Planilha de gastos
              </div>
              <div class="card-body">
              </div>
              <div class="card-footer small text-muted"><a>Gerar excel</a> / <a>Imprimir</a></div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="btn-toolbar mb-3 mb-md-0" id="periodo-2">
              <div class="btn-group">
                <select class="form-control btn-sm btn-outline-secondary mr-2" id="periodo">
                  <option value="1">Semanal</option>
                  <option value="2">Mensal</option>
                  <option value="3">Anual</option>
                </select>
              </div>
            </div>
          </div> -->
          <div class="row container" id="content-dash-2">

          </div>
        </div>
      <!-- </main> -->
    </div>
  </div>
  <?php
}else{
  echo "Nenhuma venda foi realizada!";
}
include "app/reports/modal.php";
?>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->
<div id="tblTeste">
</div>
