
<!DOCTYPE html>
<html lang="en">
<head>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<script type="text/javascript" src="assets/js/content.js"></script>
<script type="text/javascript" src="assets/js/popper.js"></script>
<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="p-4 pt-5">
				<!-- <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a> -->
				<h3>Neusa Moda</h3>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="main.php?folder=app/sell/&file=frmins.php">Vender</a>
					</li>
					<li>
						<a href="main.php?folder=app/payment/&file=frmins.php">Cadastrar pagamento</a>
					</li>
					<li class="">
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Consultas</a>
						<ul class="collapse list-unstyled" id="homeSubmenu">
							<li>
								<a href="main.php?folder=app/customers/&file=library.php">Clientes</a>
							</li>
							<li>
								<a href="main.php?folder=app/delivery/&file=library.php">Vendas Condicionais</a>
							</li>
							<li>
								<a href="main.php?folder=app/products/&file=library.php">Produtos</a>
							</li>
							<li>
								<a href="main.php?folder=app/categories/&file=library.php">Categorias</a>
							</li>
							<li>
								<a href="main.php?folder=app/providers/&file=library.php">Fornecedores</a>
							</li>
							<li>
								<a href="main.php?folder=app/teller/&file=frmins.php">Caixa</a>
							</li>
							<li>
								<a href="main.php?folder=app/sell/&file=library.php">Vendas</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="main.php?folder=app/reports/&file=dashboard.php">Relatórios</a>
					</li>
					<li>
						<a class="nav-link" href="security/authentication/logout.php" tabindex="-1" aria-disabled="true">Sair</a>
					</li>

				</ul>

				<div class="footer">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Truchinski Comércio LTDA | Software desenvolvido por João Pedro Truchinski Borba <i class="icon-heart" aria-hidden="true"></i>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>

				</div>
			</nav>

			<!-- Page Content  -->
			<?php
			if($_GET['folder']=="app/categories/"){
				$class="container w-100  myscroll";
			}else{
				$class="p-4 p-md-5";
			}

			?>
			<div id="content" class="<?php echo $class; ?> h-100 vh-100">
				<?php
				if (isset($_GET['folder']) && isset($_GET['file'])){ // se tiver include
					// if(!include $_GET['folder'].$_GET['file']){  //se o include de uma pagina der errado
					//   echo "Deu errado o include";
					// }
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
		</div>
	</div>
</body>
</html>
