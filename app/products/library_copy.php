<div class="col-12" id='div-products'>
  <div class="row">
    <div class="col-6">
      <h2>Produtos<button style='margin-left: 4%' type="button" class="btn btn-light" id='add-product'>Adicionar produto</button></h2>
    </div>
    <div class="col-6">
      <h2></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class='row'>
        <div class="col-sm-6">
          <div class="input-group input-group-sm">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg"><img src="assets/css/bootstrap-icons-1.0.0/search.svg" alt="pesquisar" width="" height="" title="pesquisar"></span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="search" id="search" placeholder="Buscar produto...">
          </div>
        </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="check-status">
        <label class="custom-control-label" for="check-status">Disponíveis</label>
      </div>
    </div>
      <table id='employee_table' class='table table-sm table-striped'>
        <thead class='thead-dark'>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Nome</th>
            <th scope="col">Categoria</th>
            <th scope="col">Valor</th>
            <th scope="col">Descrição</th>
            <th scope="col">Status</th>
            <th scope="col">Informações</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody id="see-products"></tbody>
      </table>
    </div>
    <div class="col-6" id='area-product'>
    </div>
  </div>
</div>
