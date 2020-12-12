<div class="my-custom-scrollbar my-custom-scrollbar-primary container">
  <div class="table-responsive">
    <table class='table table-striped table-hover table-sm pt-3'>
      <thead class='thead-dark'>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th> <!-- Nome -->
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

        $sql = "SELECT * from fornecedores ORDER by nome ASC";

        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();

        $providers = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($providers as $provider) { //para cada linha, crie uma variavel user
        ?>
          <tr onclick="openModal('app/products/pesquisa.php', {providerid: '<?php echo $provider['id']; ?>'}, 'todos', {titulo: 'Produtos do Fornecedor <?php echo $provider['nome']; ?>', searchbar: 'true', filter: 'true', tamanho: 'lg', 
              htmlModal: '#htmlModal', button: 'btnModal'})">
            <td><?php echo $provider['id']; ?></td>
            <td><?php echo $provider['nome']; ?></td>
            <td name="nome"><?php echo $provider['dsc']; ?></td>
            <td><img src="assets/css/bootstrap-icons-1.0.0/pencil-square.svg" alt="pesquisar" width="" height="" title="alterar" onclick="conteudo('#content', 'providers', 'frmupd', '<?php echo $provider['id']; ?>', '')"></td>
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



<div class="row mt-3">


  <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="Third group">
      <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/providers/&file=frmins.php" class="text-dark">Adicionar <img src='assets/css/bootstrap-icons-1.0.0/plus.svg'></a></button>
    </div>
  </div>

</div>