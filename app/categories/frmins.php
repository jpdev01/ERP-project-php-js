
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/dbfunctions.js"></script>
  <form action="" method="post" id="ajax_form">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" required>
      </div>
      <div class="form-group col-md-3">
        <label for="desc">Descrição:</label>
        <input type="text" class="form-control" name="desc"id="desc">
      </div>
    </div>
    <button type="reset" class="btn btn-danger">Apagar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
  </form>
