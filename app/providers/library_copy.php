<div class="row h-50">
  <div class="col h-100">
    <div class="row mt-3 pt-3 h-100 w-100 d-inline-block container mypagina shadow-sm">
      <div class='w-100 h-100 p-3'>
        <h4>Fornecedores</h4>
        <div class="table-wrapper-scroll-y my-custom-scrollbar h-100">
          <!-- <div class='table-responsive table-wrapper-scroll-y my-custom-scrollbar h-100'> -->
          <table class='table table-striped table-hover table-sm pt-3'>
            <thead class='thead-dark'>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Observação</th>
                <th scope="col">Alterar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "security/database/connection.php";
              $sql = "SELECT * from fornecedores ORDER by nome ASC";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql -> execute();

              $forns = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              foreach($forns as $forn){//para cada linha, crie uma variavel forn
                ?>

                <tr onclick="conteudo('#content2', 'providers', 'products', '<?php echo $forn['id']; ?>', 'todos')">
                  <td><?php echo $forn['id']; ?></td>
                  <td><?php echo $forn['nome']; ?></td>
                  <td><?php echo $forn['tel']; ?></td>
                  <td><?php echo $forn['obs']; ?></td>
                  <td><img src="assets/css/bootstrap-icons-1.0.0/pencil-square.svg" alt="pesquisar" width="" height="" title="alterar" onclick="conteudo('#content', 'providers', 'frmupd', '<?php echo $forn['id'];?>', '')"></td>
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
  <div class="col h-100" id="content2">

          <!-- <div id="content2">

          </div> -->
  </div>
</div>


<div class="row w-50 mt-3 d-inline-block">
  <div class='container w-50'>


    <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group" role="group" aria-label="Third group">
        <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/categories/&file=frmins.php" class="text-dark">Adicionar  <img src='assets/css/bootstrap-icons-1.0.0/plus.svg'></a></button>
      </div>
    </div>

  </div>
</div>
