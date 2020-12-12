
<div class="col-12" id='div-products'>
  <div id="htmlModal"></div>
  <div class="row">
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
        <div class='table-responsive'>
          <table class="table table-striped table-sm" id='employee_table'>
            <thead class="thead-dark">
              <tr>
                <th>Data da venda</th>
                <th>Valor</th>
                <th>Produtos</th>
                <th>Cliente</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "security/database/connection.php";
              $sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id ORDER by v.data ASC";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql -> execute();

              $vendas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              foreach($vendas as $venda){//para cada linha, crie uma variavel forn
                $produtos = $venda['produtos'];
                $produtos = unserialize ($produtos);
                ?>
                <tr onclick="openModal('app/sell/focus.php', {vendaid: '<?php echo $venda['id']; ?>'}, '', {titulo: 'Descrição da Compra', tamanho: 'md', searchbar: 'false', filter: 'false', 
              htmlModal: '#htmlModal', button: 'btnModal'})">
                  <td position="sticky"><?php echo $venda['data']; ?></td>
                  <td><?php echo 'R$'.$venda['vlrTotal'];?></td>
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
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      <!-- <div class="col-4" id='content-vendas-2'>

      </div> -->
    </div>
  </div>
</div>
</div>
