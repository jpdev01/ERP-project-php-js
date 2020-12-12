<?php
$placeholder = isset($placeholder) ? $placeholder : "Pesquisar";
?>

<?php
$withSearch = ['customers', 'products', 'categories', 'providers'];
$withFilter = ['customers', 'products', 'payment', 'future-payments'];
$search = false;
$filter = false;
if (isset($_GET['folder']) && isset($_GET['file'])) {
  foreach ($withSearch as $pag) {
    if (($_GET['folder'] == "app/" . $pag . "/") && ($_GET['file'] == "library.php")) {
      $search = true;
    }
  }
  foreach ($withFilter as $pag) {
    if (($_GET['folder'] == "app/" . $pag . "/") && ($_GET['file'] == "library.php")) {
      $filter = true;
    }
  }
}

?>
<div class="row col-12" id="all-filters">
  <div class="col-md-3">
  </div>

  <div class="col-md-6">
    <?php
    if ($search == true) {
    ?>
      <div class="input-group input-group-sm">
        <input class="form-control bg-light bg-transparent border-0" id="search" type="text" placeholder="<?php echo $placeholder; ?>" aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
          <button class="btn btn-light rounded-circle" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <?php

  if ($filter == true) {
  ?>
    <div class="col-md-3">
      <button type="button" class="btn btn-light pull-right h2 btn-sm" data-toggle="collapse" data-target="#myFilters" aria-expanded="false" aria-controls="myFilters">
        <!-- Mais filtros -->
        <img src='assets/css/bootstrap-icons-1.0.0/funnel-fill.svg' width='100%' height='100%'>
      </button>
    </div>

  <?php
  }
  ?>
</div>