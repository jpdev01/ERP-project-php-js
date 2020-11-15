<?php
// $previous = "javascript:history.go(-1)";
// if(isset($_SERVER['HTTP_REFERER'])) {
//     $previous = $_SERVER['HTTP_REFERER'];
// }
?>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>

<?php
$id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
// include "library.php";
include "../../security/database/connection.php";

$sql ="SELECT * FROM clientes WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
$stm_sql-> execute();

$cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
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

<div class="col-12">
  <div class="row">
    <div class="col-8">
      <h5 class=""><img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='50' height='50' >Cliente: <?php echo $cliente['nome'];?></h5>
    </div>
  </div>
  <div class="row pt-4">


    <div class="col-6">
      <p class="border-bottom"><strong>Identidade</strong></p>
      <p><strong>Apelido: </strong><?php echo $cliente['apelido'];?></p>
      <p><strong>Apelido: </strong><?php echo $cliente['apelido'];?></p>
      <p><strong>CPF: </strong><?php echo $cliente['cpf'];?>  </p>
      <p><strong>RG: </strong><?php echo $cliente['rg'];?>  </p>
      <p><strong>Data de nascimento:</strong><?php echo $cliente['dataNascimento'];?>  </p>
    </div>

    <div class="col-6">
      <p class="border-bottom"><strong>Contato</strong></p>
      <p><strong>Email: </strong><?php echo $cliente['email'];?>  </p>
      <p><strong>Telefone: </strong><?php echo $cliente['fone'];?>  </p>
      <p><strong>Celular: </strong><?php echo $cliente['celular'];?>  </p>
      <?php
      $arrEnd = $cliente['end'];
      $arrEnd = unserialize ($arrEnd);
      $end = $arrEnd['logradouro'].", ".$arrEnd['complemento'].", ".$arrEnd['bairro'].", ".$arrEnd['municipio'].", ".$arrEnd['uf']."-".$arrEnd['cep'].".";
      ?>
      <p><strong>Endereço: </strong><?php echo $end; ?></p>
    </div>
    <div class="col-6 pt-4">
      <p class="border-bottom"><strong>Informações de cadastro</strong></p>
      <p><strong>Tamanho:</strong><?php echo $cliente['tam'];?> <strong> - Medida :</strong><?php echo $cliente['medida'];?> </p>
      <p><strong>Data de registro:</strong><?php echo $cliente['dataRegistro'];?>  </p>
    </div>
    <div class="col-6 pt-4">
      <p class="border-bottom"><strong>Mais Informações</strong></p>
      <p><strong>Referência:</strong><?php echo $cliente['refer'];?>  </p>
      <p><strong>Filiação:</strong><?php echo $cliente['filiacao'];?>  </p>
      <p><strong>Observação:</strong><?php echo $cliente['dsc'];?>  </p>
    </div>

  </div>
  <div class="row">
    <div class="btn-group pull-right" role="group" aria-label="Third group">
      <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/customers/&file=frmupd.php&id=<?php echo $cliente['id']; ?>" class="text-dark">Editar  <img src='assets/css/bootstrap-icons-1.0.0/pencil.svg'></a></button>
    </div>
  </div>
</div>


<!-- </div> -->
