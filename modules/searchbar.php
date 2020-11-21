<?php
$placeholder = isset($placeholder) ? $placeholder : "Pesquisar";
?>

<div class="input-group">
  <input class="form-control" id="search" type="text" placeholder="<?php echo $placeholder; ?>" aria-label="Search" aria-describedby="basic-addon2" />
    <div class="input-group-append">
      <button class="btn btn-light" type="button"><i class="fas fa-search"></i></button>
  </div>
</div>
