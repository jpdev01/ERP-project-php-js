<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h4>Categorias</h4>
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
        <div class="table-responsive">
          <table class='table table-striped table-hover table-sm pt-3'>
            <thead class='thead-dark'>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>  <!-- Nome -->
                <th scope="col">Descrição</th>
                <th scope="col">Alterar</th>
                <!-- <th scope="col">Excluir</th>
                <th scope="col">Produtos</th> -->
              </tr>
            </thead>
            <tbody>

              <?php
              include "security/database/connection.php";

              // $sql = "SELECT * FROM clientes";

              $sql = "SELECT * from categorias ORDER by nome ASC";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql -> execute();

              $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              foreach($categories as $category){//para cada linha, crie uma variavel user
                ?>

                <tr onclick="conteudo('#content2', 'categories', 'products', '<?php echo $category['id']; ?>', 'todos')">
                  <td><?php echo $category['id']; ?></td>
                  <td><?php echo $category['nome'];?></td>
                  <td name="nome"><?php echo $category['dsc'];?></td>
                  <td><img src="assets/css/bootstrap-icons-1.0.0/pencil-square.svg" alt="pesquisar" width="" height="" title="alterar" onclick="conteudo('#content', 'categories', 'frmupd', '<?php echo $category['id'];?>', '')"></td>
                  <!-- <td><img src="assets/css/bootstrap-icons-1.0.0/trash.svg" alt="pesquisar" width="" height="" title="apagar"></td> -->
                  <!-- <td><img src="assets/css/bootstrap-icons-1.0.0/bag.svg" alt="pesquisar" width="" height="" title="produtos" onclick='category_products(<?php echo $category['id']; ?>, "todos")'></td> -->
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="row" id="top">
        <div class="col-md-3" id='title-02'>
          <h2></h2>
        </div>

        <div class="col-md-6">
          <div class="input-group">
            <input class="form-control" id="search"type="text" placeholder="Pesquisar produto..." aria-label="Search" aria-describedby="basic-addon2" />
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
      <div class="row">
        <input id="category" name="category" value="" hidden>
      <?php include "app/products/filters.php"; ?>
    </div>
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
        <div class='table-responsive'>
          <table id='employee_table' class='table table-sm table-striped'>
            <thead class='thead-dark'>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="content2"></tbody>
          </table>
        </div>

      </div>

    </div>
  </div>


  <div class="row mt-3">
    <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group" aria-label="Third group">
        <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/categories/&file=frmins.php" class="text-dark">Adicionar  <img src='assets/css/bootstrap-icons-1.0.0/plus.svg'></a></button>
      </div>
    </div>

  </div>
</div>
