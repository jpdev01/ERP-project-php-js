<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NEUSA MODA</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0, width=device-width" />
    <!--css-->
    <!-- <link rel="stylesheet" href="../../assets/css/styletbl.css">
    <link rel="stylesheet" href="../../assets/css/mainstyle.css"> -->
    <!--css de busca e filtros-->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/find.css"> -->

    <!-- js busca clientes-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../../assets/js/filtros.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="../../assets/css/find.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


</head>
<body>
  <div class="buscar-cx" background-image="../assets/image/icon-find.png">
    <input type="text" name="search" id="search" class="buscar-txt form-control" placeholder="Buscar..."/>
    <i class="far fa-search"></i>
  </div>


  <?php
  $pagina = $_SERVER['PHP_SELF'];
  if ((strpos($pagina,"customers") == true) || ((strpos($pagina,"products") == true))){
  ?>
  <div class="liga-desliga">
    <input type="checkbox" class="liga-desliga__checkbox" id="liga-desliga" onchange="apfiltros(this)">
    <label for="liga-desliga" class="liga-desliga__botao" >Filtros</label>
  </div>
<?php }?>


</body>
</html>
