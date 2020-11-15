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


      Apelido: <?php echo $cliente['apelido'];?>


    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item myGroupList" data-toggle="collapse" data-target="#collapseInfos" aria-expanded="false" aria-controls="collapseInfos">Clique para detalhes</li>
      <div class="collapse" id="collapseInfos">
        <li class="list-group-item">Apelido: <?php echo $cliente['apelido'];?></li>
        <li class="list-group-item">CPF: <?php echo $cliente['cpf'];?>  | RG:<?php echo $cliente['rg'];?></li>
        <li class="list-group-item">Data de nascimento: <?php echo $cliente['dataNascimento'];?></li>
        <li class="list-group-item">Email: <?php echo $cliente['email'];?></li>
        <li class="list-group-item">Telefone: <?php echo $cliente['fone'];?></li>
        <li class="list-group-item">Celular: <?php echo $cliente['celular'];?></li>
        <li class="list-group-item">Data de registro: <?php echo $cliente['dataRegistro'];?></li>
        <li class="list-group-item">Tamamho: <?php echo $cliente['tam'];?>| Medida: <?php echo $cliente['medida'];?></li>
        <li class="list-group-item">Referência: <?php echo $cliente['refer'];?></li>
        <li class="list-group-item">Filiação: <?php echo $cliente['filiacao'];?></li>
        <?php
        $endereco = $cliente['end'];
        $endereco = unserialize($endereco);
        $end = "CEP: ".$endereco['cep']." - ".$endereco['uf'].", ".$endereco['municipio'].", ".$endereco['bairro'].", ".$endereco['logradouro'].", ".$endereco['complemento'];
        ?>
        <li class="list-group-item">Endereço: <?php echo $end;?></li>
        <li class="list-group-item">Trabalho: <?php echo $cliente['cargo'];?></li>
        <li class="list-group-item">Crédito: <?php echo $cliente['credito'];?></li>
        <li class="list-group-item">Observação: <?php echo $cliente['dsc'];?></li>
      </div>
      <!-- <li class="list-group-item">Alterar</li>
      <li class="list-group-item">Vestibulum at eros</li> -->
    </ul>
  </div>
</div>
