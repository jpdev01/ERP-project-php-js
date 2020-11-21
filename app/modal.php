<?php
$id = isset($_POST['content']) ? $_POST['content'] : '';
if($id){
  if (isset($id['categoryid'])){
    $filter = "category";
    $id = $id['categoryid'];
  }else if (isset($id['providerid'])){
    $filter = "provider";
    $id = $id['providerid'];
  }
}
if ($id==0){
  $id = isset($_POST['providerid']) ? $_POST['providerid'] : 0;
}
$options = isset($_POST['options']) ? $_POST['options'] : 0;
$data = (isset($_POST['html'])) ? $_POST['html'] : "Nenhum produto encontrado";
$titulo = (isset($options['titulo'])) ? $options["titulo"] : "Título não encontrado";
$size = (isset($options['tamanho'])) ? $options["tamanho"] : "";


?>
<script type="text/javascript" src="assets/js/filtros.js"></script>
<button id="btnModal" type="button" class="btn btn-light" data-toggle="modal" data-target="#staticBackdrop" hidden>Abrir modal</button>
<!-- Modal -->
<div class="modal fade bd-example-modal-<?php echo $size; ?>" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-<?php echo $size; ?>">
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
              <?php
              if ($options['searchbar'] == 'true'){
                include "../modules/searchbar.php";
              }
              ?>
            </div>

            <div class="col-md-3">
              <?php
              if($options['filter'] == 'true'){
                include "../modules/btnFilter.php";
              }
              ?>
            </div>
          </div> <!-- /#top -->
          <div class="row mt-2">
            <?php
            if($options['filter'] == 'true'){
              ?>
              <input id="pathFilter" name="category" value="filter=<?php echo $filter; ?>;id=<?php echo $id; ?>" hidden>
              <?php
              include "products/filters.php";
            }
            ?>
          </div>
          <div class='row' id='#content2'>
        <?php echo $data; ?>
      </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
