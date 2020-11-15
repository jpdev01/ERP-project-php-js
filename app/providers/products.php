<script type="text/javascript" src="assets/js/filtros.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<?php
$id_fornecedor = (isset($_POST['id']) ? $_POST['id'] : null);
$status = (isset($_POST['status']) ? $_POST['status'] : "todos");
?>


<div class='row'>
  <div class="col-sm-6">
    <div class="input-group input-group-sm">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg"><img src="assets/css/bootstrap-icons-1.0.0/search.svg" alt="pesquisar" width="" height="" title="pesquisar"></span>
      </div>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="search" id="search" placeholder="Buscar produto...">
    </div>
  </div>
  <div class="custom-control custom-checkbox">
    <input type='number' name="fornecedor_id" id="fornecedor_id" value='<?php echo $id_fornecedor; ?>' hidden>
    <?php
    $checked='';
    if($status=="0"){
      $checked="checked";
    }
     ?>
    <input type="checkbox" class="custom-control-input" id="check-status-f" <?php echo $checked; ?>>
    <label class="custom-control-label" for="check-status-f">Disponível</label>
  </div>
</div>
<table id='employee_table' class='table table-sm table-striped'>
  <thead class='thead-dark'>
    <tr>
      <th scope="col">Code</th>
      <th scope="col">Nome</th>
      <th scope="col">Categoria</th>
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

    include '../../security/database/connection.php';
    $sql = "SELECT p.*, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id WHERE p.fornecedores_id=:id";
    if ($status!=null && $status!='todos'){
      $sql .= ' AND status='.$status;
    }
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql -> bindParam(':id', $id_fornecedor);
    $stm_sql -> execute();

    $products = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($products as $product){
      ?>
      <tr>
        <td><?php echo $product['code'];?></td>
        <td><?php echo $product['nome'];?></td>
        <td><?php echo $product['nomecategoria'];?></td>
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
