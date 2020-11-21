<div class="col-12">
  <div class="row" id="top">
    <div class="col-md-3" id='title-01'>
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

  <div class="row mt-3 mb-3">
    <?php include "app/products/filters.php"; ?>
  </div>

  <div class="row mt-3">
    <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
      <div class='table-responsive'>
        <!--
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
        -->
        <div id="content2"></div>
      </div>

    </div>
  </div>


  <div class="row mt-3 d-inline-block">
    <div class='container'>


      <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group" role="group" aria-label="Third group">
          <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/products/&file=frmins.php" class="text-dark">Adicionar  <img src='assets/css/bootstrap-icons-1.0.0/plus.svg'></a></button>
        </div>
      </div>

    </div>
  </div>
</div>
