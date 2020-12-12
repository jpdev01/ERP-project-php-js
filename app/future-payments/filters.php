
<div class="container collapse" id="myFilters">
  <div class="container card card-block">
    <form id='frm-customers' class="m-md-4">
      <div class='container'>
        <div class="form-row">
          <div class="form-group">
            <label for="check-status">Bandeiras:</label>
            <select class="form-control" id="check-flags">
              <option value="all" selected>Todos</option>
              <?php
              foreach ($FLAGS as $key => $flag){
                  ?>
                  <option value="<?php echo $key; ?>"><?php echo $flag; ?></option>
                  <?php
              }
              ?>
            </select>
          </div>
          <!-- <div class="form-group">
            <label for="check-status">Ordenar:</label>
            <select class="form-control" id="check-status">
              <option value="todos" selected>Todos</option>
              <option value="0">Disponíveis</option>
              <option value="1">Indisponíveis</option>
            </select>
          </div> -->
        </div>
      </div>
    </form>
  </div>
</div>
