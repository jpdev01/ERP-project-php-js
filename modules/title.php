<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0, width=device-width" />
  <!--css-->
  <!-- <link rel="stylesheet" href="../assets/css/mainstyle.css"> -->


</head>
<body>
  <?php
  $pag_anterior = $_SERVER['PHP_SELF'];
  if (strpos($pag_anterior,"categories") == true) {
    $pagina = "Categorias Cadastradas";
    $new = "Adicionar Categoria";
  }
  else if (strpos($pag_anterior,"customers") == true){
    $pagina = "Clientes Cadastrados";
    $new = "Adicionar Cliente";
  }
  else if (strpos($pag_anterior,"products") == true){
    $pagina = "Produtos Cadastrados";
    $new = "Adicionar Produto";
  }
  else if (strpos($pag_anterior,"providers") == true){
    $pagina = "Fornecedores Cadastrados";
    $new = "Adicionar Fornecedor";
  }
  else if (strpos($pag_anterior,"users") == true){
    $pagina = "Usuários Cadastrados";
    $new = "Adicionar Usuário";
  }
  else if (strpos($pag_anterior,"sell") == true){
    $pagina = "Vendas";
    $new = "";
  }
  ?>
  <div class="secaotitulo">
    <h3 class="area"><?php echo $pagina;?></h3>
    <button class="novocliente" onclick="ins()"><?php echo $new;?></button>
  </div>
</body>
</html>
