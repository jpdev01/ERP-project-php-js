<div class="col-12">
  <div class="row" id="top">
    <div class="col-md-3" id='title-01'>
      <h2></h2>
    </div>

    <div class="col-md-6">
      <div class="input-group">
        <input class="form-control" id="search"type="text" placeholder="Pesquisar cliente..." aria-label="Search" aria-describedby="basic-addon2" />
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
    <div class="container collapse" id="myFilters">
      <div class="container card card-block">
        <form id='frm-customers' class="m-md-4">
          <div class='container'>
            <div class="form-row">
              <div class="form-group input-group-sm" id="frm-tam" method="post" action="">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" id="box-1" value="p" class="tamanho custom-control-input" name="tamanhop">
                  <label class="custom-control-label" for="box-1">P</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" id="box-2" value="m" class="tamanho custom-control-input" name="tamanhom">
                  <label class="custom-control-label" for="box-2">M</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" id="box-3" value="g" class="tamanho custom-control-input" name="tamanhog">
                  <label class="custom-control-label" for="box-3">G</label>
                </div>
              </div>
              <div class="form-group col-md-2 custom-control-inline">
                <label for="box-4">De:   </label>
                <select id="box-4" id="box-4" name="selectmin" class="tamanho form-control form-control-sm" >
                  <option value="" selected>Tamanho mínimo...</option>
                  <?php
                  for($i=30 ; $i < 60; $i+=2)
                  echo "<option value='$i'>$i</option>";
                  ?>
                </select>
              </div>
              <div class="form-group col-md-2 custom-control-inline">
                <label for="box-5">Até:   </label>
                <select id="box-5" name="selectmax" class="tamanho form-control form-control-sm" >
                  <option value="" selected>Tamanho máximo...</option>
                  <?php
                  for($i=30 ; $i < 60; $i+=2)
                  echo "<option value='$i'>$i</option>";
                  ?>
                </select>
              </div>
              <div class="form-group col-md-2 custom-control-inline">
                <label for="box-10">Ordenar:   </label>
                <select id="box-10" name="order" class="tamanho form-control form-control-sm" >
                  <option value="0" selected>Nome</option>
                  <option value="1">Data de Aniversário</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
      <div class='table-responsive'>
        <table class='table table-striped table-hover table-md' id='employee_table'>
          <thead class='thead-dark rounded'>
            <tr>
              <th class="th-sm" scope='col'>Código do Cliente</th>
              <th class="th-sm" scope='col'>Nome</th>
              <th class="th-sm" scope='col'>CPF</th>
              <th class="th-sm" scope='col'>Telefone</th>
              <th class="th-sm" scope='col'>Celular</th>
            </tr>
          </thead>
          <tbody id="MostraPesq">
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="row mt-3 container pull-right">


    <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">
      <!-- <div class="btn-group mr-2" role="group" aria-label="First group">
      <button type="button" class="btn btn-secondary">1</button>
      <button type="button" class="btn btn-secondary">2</button>
      <button type="button" class="btn btn-secondary">3</button>
      <button type="button" class="btn btn-secondary">4</button>
    </div>
    <div class="btn-group mr-2" role="group" aria-label="Second group">
    <button type="button" class="btn btn-secondary">5</button>
    <button type="button" class="btn btn-secondary">6</button>
    <button type="button" class="btn btn-secondary">7</button>
  </div> -->
  <div class="btn-group" role="group" aria-label="Third group">
    <button type="button" class="btn btn-light pull-right m-2"><a href="main.php?folder=app/customers/&file=frmins.php" class="text-dark">Adicionar  <img src='assets/css/bootstrap-icons-1.0.0/plus.svg'></a></button>
  </div>

</div>

<!--

</div> -->
<!-- <div class="col-sm-4" id='div-customer'>

</div> -->
<!-- </div>
</div> -->
