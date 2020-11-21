
<div class="col-12" id='div-products'>
  <div class="row">
    <div class="col-5">
      <h5>Vendas condicionais ou delivery</h5>
</div>
<div class="col-4">
<?php 
      $placeholder = "Pesquisar por detalhes";
      include "modules/searchbar.php"; 
      ?>
</div>
  </div>
  <div class="row mt-2">
    <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
      <div class='table-responsive'>
        <table class="table table-striped table-sm table-hover">
          <thead class="thead-dark">
            <tr>
              <th>Data</th>
              <th>Produtos</th>
              <th>Cliente</th>
              <th>Concluir</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              include "security/database/connection.php";
              $sql = "SELECT d.*, c.nome AS nomecliente FROM delivery d INNER JOIN clientes c ON d.clientes_id = c.id ORDER by d.data ASC";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql -> execute();

              $vendas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              foreach($vendas as $venda){//para cada linha, crie uma variavel forn
                $produtos = $venda['produtos'];
                $produtos = unserialize ($produtos);
                ?>

                <tr>
                  <td position="sticky"><?php echo date('d/m/Y h:m', strtotime($venda['data'])); ?></td>
                  <td>
                    <?php
                    foreach($produtos as $produto){
                      $sql = "SELECT id, nome from produtos WHERE code=:code";
                      $stm_sql = $db_connection->prepare($sql);
                      $stm_sql -> bindParam(':code', $produto);
                      $stm_sql -> execute();

                      $nome_produto = $stm_sql->fetch(PDO::FETCH_ASSOC);
                      $nome_produto = $nome_produto['nome'];
                      echo 'Produto: '.$nome_produto;
                      ?> <br> <?php
                    }
                    ?></td>
                    <td><?php echo $venda['nomecliente'];?></td>
                    <td><img onclick='delivery_venda("<?php echo $venda['id']; ?>")' src="assets/css/bootstrap-icons-1.0.0/bag-check.svg" alt="Informações da venda" width="" height="" title="Informações da venda"></td>
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
  </div>
</div>
  <!-- <script type="text/javascript" src="assets/js/sell.js"></script> -->
