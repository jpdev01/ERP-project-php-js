<!--
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
-->

<?php
$id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
$sql ="SELECT nome FROM clientes WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();
$cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
include "../../security/database/connection.php";

$sql ="SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON c.id = v.clientes_id WHERE clientes_id=:id";
// $sql ="SELECT * FROM vendas WHERE clientes_id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$compras = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
//var_dump($user['email']);



?>
<div class="row container m-0 mw-100">
  <div class='container h-100'>
    <ul class="nav nav justify-content-center nav-pills nav-fill flex-column flex-sm-row m-2">
      <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/customers/&file=library.php"><img src='assets/css/bootstrap-icons-1.0.0/arrow-left.svg' width='' height='' class="mr-2">Voltar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/customers/&file=focus.php&id=<?php echo $id; ?>"><img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='' height='' class="mr-2">Dados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" class="text-dark" href="main.php?folder=app/customers/&file=historic.php&id=<?php echo $id; ?>"><img src='assets/css/bootstrap-icons-1.0.0/bag-fill.svg' width='' height='' class="mr-2">Compras</a>
      </li>
    </ul>
  </div>
</div>








<!-- <div class="container"> -->
  <div id="htmlModal"></div>
<div class="col-12 container">
  <div class="row">
    <div class="col-6">
      <h5 class=""><img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='50' height='50' >Cliente: <?php echo $cliente['nome'];?></h5>
    </div>
    <div class='col-2'>
    <div class="form-group">
      <label for="view">Visualizar</label>
      <select id="view" class="custom-select custom-select-sm" onchange="changeSeeHis();">
        <option value="list" selected>Lista</option>
        <option value="grid">Ícones</option>
      </select>
    </div>
    </div>
  </div>
  <div class="row pt-4">
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
      <input id="cliente" value="<?php echo $cliente['nome']; ?>" hidden>
      <input id="pag" value="customers" hidden>
      <?php
        include "app/payment/find-buy-table.php";
      ?>
      <div id="pend-customer-grid">
      
      </div>
      
        
    </div>
    <!--
    <div class="col-4">
      <div id="content2">
      </div>
    </div>
-->
  </div>
</div>
<script type="text/javascript" src="assets/js/scroll.js"></script>
<!-- </div> -->
