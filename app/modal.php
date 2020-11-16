<?php
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$options = isset($_POST['options']) ? $_POST['options'] : 0;
$data = (isset($_POST['data'])) ? $_POST['data'] : "Nenhum produto encontrado";
$titulo = (isset($options['titulo'])) ? $options["titulo"] : "Título não encontrado";


 ?>
 <button id="btnModal" type="button" class="btn btn-light" data-toggle="modal" data-target="#staticBackdrop" hidden>Abrir modal</button>
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $titulo; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <!--onClick="window.location.reload()"-->
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
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
          <?php include "products/filters.php"; ?>
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
                <tbody>
                  <?php
                  echo $data;
                   ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
