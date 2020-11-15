<?php
include "security/authentication/validation.php";
include "security/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Neusa Moda</title>
  <link href="assets/imports/styles.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<!-- js bootstrap -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


<!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->

<!-- <script src="assets/js/dashboard.js"></script> -->
<body class="sb-nav-fixed">


  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Neusa Moda</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login.html">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
            <a class="nav-link" href="main.php?folder=app/sell/&file=frmins.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Vender
            </a>
            <a class="nav-link" href="main.php?folder=app/teller/&file=frmins.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Caixa
            </a>
            <a class="nav-link" href="main.php?folder=app/payment/&file=frmins.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Pagamentos
            </a>
            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Consultas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="main.php?folder=app/customers/&file=library.php">Clientes</a>
                <a class="nav-link" href="main.php?folder=app/products/&file=library.php">Produtos</a>
                <a class="nav-link" href="main.php?folder=app/categories/&file=library.php">Categorias</a>
                <a class="nav-link" href="main.php?folder=app/providers/&file=library.php">Fornecedores</a>
                <a class="nav-link" href="main.php?folder=app/sell/&file=library.php">Vendas</a>
                <a class="nav-link" href="main.php?folder=app/delivery/&file=library.php">Vendas condicionais</a>
              </nav>
            </div>
            <a class="nav-link" href="main.php?folder=app/reports/&file=dashboard.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Dashboard
            </a>
            <a class="nav-link"  href="main.php?folder=app/users/&file=library.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Usuários
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Truchinski Comércio LTDA | Software desenvolvido por João Pedro Truchinski Borba</div>
          <!-- software desenvolvido por João Pedro Truchinski Borba -->
        </div>
      </nav>
    </div>
    <?php
    if ($_GET['folder']=="app/sell/"){
      ?>
      <style type="text/css">
      /* #layoutSidenav_content{overflow-y: hidden; height: 100%;} */
      body{overflow-y: hidden;}
      #content{height:100%!important}
      #layoutSidenav{overflow-y: hidden; height: 80%!important}
      /* body{overflow-y: hidden; height: 70%;}
      main{overflow-y: hidden; height: 70%;} */
      </style>
      <?php
    }
    ?>
    <div id="layoutSidenav_content" class="mt-4">
      <main class="container-fluid">
        <div id="content">
          <?php
          if (isset($_GET['folder']) && isset($_GET['file'])){ // se tiver include
            if(@!include $_GET['folder'].$_GET['file']){  //se o include de uma pagina der errado..........o "@" suprime o erro
              include '404.php';
            }
          }else{
            ?>
            <div class="jumbotron jumbotron-fluid vh-100" id='bem-vindo'>
              <h1 class="display-4 text-black text-center">Bem vindo, <?php echo $_SESSION['usuario'];?>!</h1>
              <p class="lead text-black text-center">Esse software foi desenvolvido por João Pedro Truchinski Borba.</p>
              <!-- <hr class="my-4"> -->
              <!-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
              <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            </div>
            <?php
          }
          ?>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">TRUCHINSKI COMÉRCIO LTDA.</div>
            <div>
              <p class="text-muted">Software desenvolvido por João Pedro Truchinski Borba</p>
              <!-- &middot; -->
              <!-- <a href="#">Terms &amp; Conditions</a> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
  <script type="text/javascript" src="assets/js/dbfunctions.js"></script>
  <script type="text/javascript" src="assets/js/sell.js"></script>
  <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js.map"></script> -->
  <script type="text/javascript" src="assets/js/filtros.js"></script>
  <script type="text/javascript" src="assets/js/myscript.js"></script>
  <script type="text/javascript" src="assets/js/content.js"></script>




  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="assets/imports/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <!-- <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <!-- <script src="assets/demo/datatables-demo.js"></script> -->

  <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script type="text/javascript" src="assets/js/scroll.js"></script>
</body>
</html>
