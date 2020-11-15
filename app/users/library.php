<div class="col-12" id='div-users'>
  <div class="row">
    <div class="col-6">
      <h2>Usuários<button style='margin-left: 4%' type="button" class="btn btn-light" id='add-user'>Adicionar usuário</button></h2>
    </div>
    <div class="col-6">
      <h2></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <table id="employee_table" class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuário</th>  <!-- Nome -->
            <th scope="col">Email</th>
            <th scope="col">Permissão</th>
            <th scope="col">Ativo</th>
            <th scope="col">Alterar</th>
          </tr>
        </thead>
        <tbody class="">

          <?php
          include "security/database/connection.php";
          $sql = "SELECT * from usuarios ORDER by usuario ASC";

          $stm_sql = $db_connection->prepare($sql);
          $stm_sql -> execute();

          $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
          foreach($users as $user){//para cada linha, crie uma variavel user
            ?>

            <tr onclick="conteudo('#content-user-2', 'users', 'board', '<?php echo $user['id']; ?>', 'null')">
              <td><?php echo $user['id']; ?></td>
              <td><?php echo $user['usuario'];?></td>
              <td><?php echo $user['email'];?></td>
              <td><?php
              $perm=$user['permissao'];
              if($perm==0){
                echo "Padrão";
              }else{
                echo "Administrador";
              }
              ?></td>
              <td><?php
              $ativo=$user['ativo'];
              if($ativo==0){
                echo "Ativo";
              }else{
                echo "Desativado";
              }
              ?></td>
              <!-- <a href="frmupd.php?id=<?php echo $user['id'];?>" onclick="return valAlt('usuário', '<?php echo $user['usuario'];?>')"> -->
              <td><img src="assets/css/bootstrap-icons-1.0.0/pencil-square.svg" alt="editar" width="" height="" title="editar" onclick="valAlt('usuário', '<?php echo $user['usuario'];?>', '<?php echo $user['id'];?>')"></td>
            </tr>

            <?php
          }
          ?>



        </tbody>
      </table>
    </div>
    <div class="col-6" id='content-user-2'>

    </div>
  </div>
</div>
