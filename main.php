<?php
include "security/authentication/validation.php";
include "security/database/connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Neusa Moda</title>
  <link rel="icon" type="image/png" href="assets/images/logo.png">
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
    <a class="navbar-brand" href="main.php">Neusa Moda</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form> -->
    <!-- Navbar-->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown bg-dark">
        <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <!-- <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="security/authentication/logout.php" tabindex="-1">Logout</a>
        </div>
      </li>
    </ul>
  </div>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
            <a class="nav-link" href="main.php?folder=app/sell/&file=frmins.php">
              <div class="sb-nav-link-icon">

                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>

              </div>
              Vender
            </a>
            <a class="nav-link" href="main.php?folder=app/teller/&file=frmins.php">
              <div class="sb-nav-link-icon">

                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-inbox-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
                </svg>

              </div>
              Caixa
            </a>
            <a class="nav-link" href="main.php?folder=app/payment/&file=frmins.php">
              <div class="sb-nav-link-icon">

                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                </svg>


              </div>
              Pagamentos
            </a>
            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">

                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>

              </div>
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
            <?php
            if ($_SESSION['permission']=="adm"){
            ?>
            <a class="nav-link" href="main.php?folder=app/reports/&file=dashboard.php">
              <div class="sb-nav-link-icon">

                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <rect width="4" height="5" x="1" y="10" rx="1"/>
                  <rect width="4" height="9" x="6" y="6" rx="1"/>
                  <rect width="4" height="14" x="11" y="1" rx="1"/>
                </svg>

              </div>
              Dashboard
            </a>

            <a class="nav-link"  href="main.php?folder=app/users/&file=library.php">
              <div class="sb-nav-link-icon">


                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>

              </div>
              Usuários
            </a>
            <?php
}
             ?>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Truchinski Comércio LTDA | Software desenvolvido por João Pedro Truchinski Borba</div>
          <!-- software desenvolvido por João Pedro Truchinski Borba -->
        </div>
      </nav>
    </div>
    <?php

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
    <script type="text/javascript" src="assets/js/sell.js"></script>
  <script type="text/javascript" src="assets/js/dbfunctions.js"></script>
  <!-- <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js.map"></script> -->
  
  <script type="text/javascript" src="assets/js/myscript.js"></script>
  <script type="text/javascript" src="assets/js/content.js"></script>
  <script type="text/javascript" src="assets/js/payment.js"></script>
  <script type="text/javascript" src="assets/js/filtros.js"></script>



  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <!-- <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script> -->

  <!-- <script src="assets/demo/datatables-demo.js"></script> -->

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/imports/perfect-scrollbar.js"></script>
  <script src="assets/imports/scripts.js"></script>
  <!-- <script type="text/javascript" src="assets/imports/perfect-scrollbar.min.js"></script> -->
  <script type="text/javascript" src="assets/js/scroll.js"></script>

  <script type="text/javascript" src="assets/js/excel.js"></script>
  <script type="text/javascript" src="assets/js/modal.js"></script>
  <script type="text/javascript" src="assets/imports/JsBarcode.all.min.js"></script>
  <script type="text/javascript" src="assets/js/barcode.js"></script>

</body>
</html>
