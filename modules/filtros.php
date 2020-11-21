<?php
$pagina = $_SERVER['PHP_SELF'];
if (strpos($pagina,"customers") == true){
  $pagina="clientes";
}
else if (strpos($pagina,"products") == true){
  $pagina="produtos";
}

?>
<div class="wrapper" id="tabs-geral">
  <div class="tabs">

    <div class="tab">
      <label class="tab-label">Filtrar por:</label>
    </div>
    <?php
    if ($pagina == "clientes"){?>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
      <label for="tab-1" class="tab-label">Tamanhos</label>
      <div class="tab-content">
        <!-- tab 1     -->
        <form class="boxes" id="frm-tam" method="post" action="">
          <div class="filtro">
            <label>Tamanho:</label>
            <input type="checkbox" id="box-1" value="p" class="tamanho" name="tamanhop">
            <label for="box-1">P</label>
            <input type="checkbox" id="box-2" value="m" class="tamanho" name="tamanhom">
            <label for="box-2">M</label>
            <input type="checkbox" id="box-3" value="g" class="tamanho" name="tamanhog">
            <label for="box-3">G</label>
          </div>
          <div class="filtro">
            <label for="box-4">De: </label>
            <select id="box-4" name="selectmin" class="tamanho">
              <option value="">Selecione...</option>
              <?php
              for($i=30 ; $i < 60; $i+=2)
              echo "<option value='$i'>$i</option>";
              ?>
            </select>
            <label for="box-5">Até: </label>
            <select id="box-5" name="selectmax" class="tamanho">
              <option value="">Selecione...</option>
              <?php
              for($i=30 ; $i < 60; $i+=2)
              echo "<option value='$i'>$i</option>";
              ?>
            </select>
          </div>
        </form>
      </div>
    </div>


    <!-- tab 2 -->
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
      <label for="tab-2" class="tab-label">Status</label>
      <div class="tab-content">
        <form class="boxes" id="frm-status" method="post" action="">
          <div class="filtro">
            <input type="checkbox" id="box-8" value="0" name="quite" >
            <label for="box-8">Quite</label>
            <input type="checkbox" id="box-9" value="1" name="emdebito">
            <label for="box-9">Em débito</label>
          </div>
        </form>


      </div>
    </div>

    <!-- tab 3 -->
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
      <label for="tab-3" class="tab-label">Aniversário</label>
      <div class="tab-content">
        <form class="boxes" id="frm-customers-date" method="post" action="">
          <div class="filtro">
            <input type="checkbox" id="box-10" value="0" name="date" >
            <label for="box-10">Aniversário</label>
          </div>
        </form>


      </div>
    </div>
  <?php } ?>
    <!-- tab 3 -->
    <?php if($pagina=="produtos"){ ?>
    <div class="tab">
      <input type="radio" name="css-tabs" id="tab-4" class="tab-switch">
      <label for="tab-4" class="tab-label">Estoque</label>
      <div class="tab-content">
        <form class="boxes" id="frm-prod-status" method="post" action="">
          <div class="filtro">
            <input type="checkbox" id="box-6" value="0" name="status-0" class="product-status">
            <label for="box-6">Disponível</label>
            <input type="checkbox" id="box-7" value="1" name="status-1" class="product-status">
            <label for="box-7">Indisponível</label>
          </div>
        </form>


      </div>
    </div>
    <?php } ?>
  </div>
</div>

<!-- </div> -->
