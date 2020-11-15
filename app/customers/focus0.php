<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>

<?php
$id = $_POST['id'];
// include "library.php";
include "../../security/database/connection.php";

$sql ="SELECT * FROM clientes WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
//var_dump($user['email']);




?>
<div class="row mt-3 container">
  <div class='container h-100'>
    <ul class="nav nav justify-content-center nav-pills nav-fill flex-column flex-sm-row">
      <li class="nav-item">
        <a class="nav-link active" href="#">Dados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Receitas</a>
      </li>
    </ul>
  </div>
</div>










<div class="row mt-5 container h-75 myscrool">
  <div class="row">
  <div class="col-md-2">
    <img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='64' height='64' >
  </div>
  <div class="col-md ml-2">
      <h5 class=" font-weight-bolder">Cliente: <?php echo $cliente['nome'];?></h5>
  </div>
</div>
  <div class="col-md-12">
    <div class="col-md-6">
      <div class="row">

      Apelido: <?php echo $cliente['apelido'];?>

    </div>
    </div>

  </div>
</div>
