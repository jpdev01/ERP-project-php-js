<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>

  <?php
  $id = $_POST['id'];
  // include "library.php";
  include "../../security/database/connection.php";

  $sql ="SELECT * FROM usuarios WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $user = $stm_sql->fetch(PDO::FETCH_ASSOC);
  //var_dump($user['email']);




?>
<div class="col-12">
  <div class="row">
    <div class="col-8">
      <h5 class=""><img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='50' height='50' >Usuário: <?php echo $user['usuario'];?></h5>
    </div>
  </div>
  <div class="row pt-4">


    <div class="col-12">
      <p class="border-bottom"><strong>Dados</strong></p>
      <p><strong>Cpf: </strong><?php echo $user['cpf'];?></p>
      <p><strong>Email: </strong><?php echo $user['email'];?></p>
      <?php
      if ($user['permissao']==0){
        $user['permissao']="Comum";
      }else if ($user['permissao']==1){
        $user['permissao']="Administrador";
      }
      if ($user['ativo']==0){
        $user['ativo']="Ativo";
        $desativado = "";
      }else if ($user['ativo']==1){
        $user['ativo']="Desativado";
        $desativado = $user['dataDes'];
      }
       ?>
      <p><strong>Permissão: </strong><?php echo $user['permissao'];?></p>
      <p><strong>Status: </strong><?php echo $user['ativo'];?>  </p>
      <p><strong>Período: </strong><?php echo $user['dataAtiv']." - ".$desativado; ?>  </p>
      <p><strong>Observação: </strong><?php echo $user['obs'];?>  </p>
    </div>
  <div class="row">
    <div class="btn-group pull-right" role="group" aria-label="Third group">
      <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/customers/&file=frmupd.php&id=<?php echo $user['id']; ?>" class="text-dark">Editar  <img src='assets/css/bootstrap-icons-1.0.0/pencil.svg'></a></button>
    </div>
  </div>
</div>
