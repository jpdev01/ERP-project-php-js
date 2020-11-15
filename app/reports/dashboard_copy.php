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
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-dark sidebar collapse vh-100">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item" id='graf-vendas'>
            <a class="nav-link active">
              <span data-feather="home"></span>
              Número de vendas <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item" id='graf-categories'>
            <a class="nav-link">
              <span data-feather="file"></span>
              Relatório de vendas por categoria
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id='graf-fornecedores'>
              <span data-feather="shopping-cart"></span>
              Relatório de vendas por fornecedor
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id='graf-frmpgto'>
              <span data-feather="users"></span>
              Relatório por formas de pagamento
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id='graf-produtos-categories'>
              <span data-feather="users"></span>
              Produtos disponíveis por categoria
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id='graf-produtos-fornecedores'>
              <span data-feather="users"></span>
              Produtos disponíveis por fornecedor
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
            <button type="button" class="btn btn-sm btn-outline-secondary" id='print'>Imprimir</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            Essa semana
          </button>
        </div>
      </div>

      <!-- <canvas class="line-chart" id="myChart" width="900" height="380"></canvas> -->
      <div class="chart-container">
      <canvas id='canvas_joaoBorba' class="line-chart"  width="900" height="380" name='canvas'></canvas>
    </div>

      <!-- <div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="chart"></canvas>
</div> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> -->
      <script src="assets/js/dashboard.js"></script>

      <h2>Informações</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead id='thead'>

          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php
}else{
  echo "Nenhuma venda foi realizada!";
}

 ?>
