<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecionar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input name="search" id="search" class="form-control" type="text" placeholder="Pesquisar...">
          </div>
          <!-- <div class="form-group">
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea class="form-control" id="message-text"></textarea>
        </div> -->
      </form>
      <div class="my-custom-scrollbar my-custom-scrollbar-primary container p-2">
        <div class="table-responsive">
          <table id='employee_table' class='table table-sm table-striped'>
            <thead class='thead-dark'>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = "SELECT id, nome, cpf FROM clientes";
              $stm_sql = $db_connection->prepare($sql);
              $stm_sql -> execute();
              $clientes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              foreach ($clientes as $cliente) {
                ?>
                <tr onclick="select_cliente('<?php echo $cliente['id'];?>', '<?php echo $cliente['nome'];?>')">
                  <td><?php echo $cliente['nome'];?></td>
                  <td><?php echo $cliente['cpf'];?></td>
                </tr>
                <?php
              }

              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      <!-- <button type="button" class="btn btn-primary">Send message</button> -->
    </div>
  </div>
</div>
