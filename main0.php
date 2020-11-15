<?php
include "security/authentication/validation.php";
include "security/database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Neusa moda | Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script type="text/javascript" src="assets/js/sell.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/filtros.js"></script>
<script type="text/javascript" src="assets/js/myscript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<!-- <script src="assets/js/dashboard.js"></script> -->
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="main.php">Neusa Moda</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/sell/&file=frmins.php">Vender<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/customers/&file=library.php">Clientes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/teller/&file=frmins.php">Caixa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/payment/&file=frmins.php">Pagamentos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/products/&file=library.php">Produtos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/categories/&file=library.php">Categorias</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/providers/&file=library.php">Fornecedores</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/sell/&file=library.php">Vendas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/delivery/&file=library.php">Vendas condicionais</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="main.php?folder=app/reports/&file=dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Configurações
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="main.php?folder=app/users/&file=library.php">Usuários</a>
						<!-- <a class="dropdown-item" href="#">...</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">...</a> -->
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="security/authentication/logout.php" tabindex="-1" aria-disabled="true">Sair</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row d-block" >
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
</body>
</html>
