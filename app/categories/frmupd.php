
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/dbfunctions.js"></script>
  <?php
  $id = $_POST['id'];
  include "../../security/database/connection.php";
  $sql ="SELECT * FROM categorias WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $category = $stm_sql->fetch(PDO::FETCH_ASSOC);
  ?>
  <form action="" method="post" id="ajax_form_upd">
    <input type="number" class="form-control" name="id" id="id" value="<?php echo $id; ?>" hidden>
    <div class="form-row">
      <div class="form-group col-md">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $category['nome']; ?>">
      </div>
      <div class="form-group col-md">
        <label for="desc">Descrição:</label>
        <input type="text" class="form-control" name="desc"id="desc" value="<?php echo $category['dsc']; ?>">
      </div>
    </div>
    <button type="reset" class="btn btn-danger">Apagar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
  </form>
