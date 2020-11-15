<script type="text/javascript" src="assets/js/filtros.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script type="text/javascript" src="assets/js/content.js"></script>
<?php
$id_category = (isset($_POST['id']) ? $_POST['id'] : null);
$status = (isset($_POST['filtro']) ? $_POST['filtro'] : "todos");



include '../../security/database/connection.php';

$sql = "SELECT nome FROM categorias WHERE id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> bindParam(':id', $id_category);
$stm_sql -> execute();

$category = $stm_sql->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT p.*, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id WHERE p.categorias_id=:id";
if ($status!=null && $status!='todos'){
  $sql .= ' AND status='.$status;
}
$stm_sql = $db_connection->prepare($sql);
$stm_sql -> bindParam(':id', $id_category);
$stm_sql -> execute();

$products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
?>





<div class="col-12">
  <div class="row" id="top">
    <div class="col-md-3" id='title-01'>
      <h2></h2>
    </div>

    <div class="col-md-6">
      <div class="input-group">
        <input class="form-control" id="search"type="text" placeholder="Pesquisar cliente..." aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-light" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <button type="button" class="btn btn-light pull-right h2" data-toggle="collapse" data-target="#myFilters" aria-expanded="false" aria-controls="myFilters">
        <!-- Mais filtros -->
        <img src='assets/css/bootstrap-icons-1.0.0/funnel-fill.svg' width='100%' height='100%'>
      </button>
    </div>
  </div> <!-- /#top -->
  <div class="row mt-3 mb-3">
    <?php include "../products/filters.php"; ?>
  </div>
  <div class="row">
    <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
      <div class="table-responsive">
        <table id='employee_table' class='table table-sm table-striped'>
          <thead class='thead-dark'>
            <tr>
              <th scope="col">Code</th>
              <th scope="col">Nome</th>
              <th scope="col">Valor</th>
              <th scope="col">Descrição</th>
              <th scope="col">Status</th>
              <!-- <th scope="col">Informações</th>
              <th scope="col">Editar</th> -->
            </tr>
          </thead>
          <tbody>


            <?php
            //recebemos nosso parâmetro vindo do form

            foreach($products as $product){
              ?>
              <tr>
                <td><?php echo $product['code'];?></td>
                <td><?php echo $product['nome'];?></td>
                <td>R$<?php echo $product['vlrVenda'];?></td>
                <td><?php echo $product['dsc'];?></td>
                <?php
                $status = $product['status'];
                if ($status==0){
                  $status = "Disponível";
                }else if ($status==1){
                  $status = "Indisponível";
                }
                else{
                  $status =  "Indisponível(troca)";
                }
                ?>
                <td><?php echo $status;?></td>
              </tr>
              <?php
            }
            ?>






          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
