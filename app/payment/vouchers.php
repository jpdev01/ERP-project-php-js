<?php
$saldo = isset($_POST['saldo']) ? $_POST['saldo'] : 0;
$pag = isset($_POST['pag']) ? $_POST['pag'] : 0;
if ($pag=="find-buy-select.php"){
    $event_onclick = "apply_voucher()";
}
?>

<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
  <div class="card-header">Voucher</div>
  <div class="card-body">
    <!-- 
    <h5 class="card-title">Success card title</h5>
-->
    <p class="card-text">R$ <?php echo $saldo; ?></p>
    <button type="button" class="btn btn-outline-light btn-sm inline" onclick="<?php echo $event_onclick; ?>">Aplicar</button>
  </div>
</div>