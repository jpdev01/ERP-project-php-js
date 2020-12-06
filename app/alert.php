
<div class="alert alert-<?php echo $msg_tema; ?> alert-dismissible fade show" role="alert">
<?php 
if ($msg_strong){
    ?>
    <strong><?php echo $msg_strong; ?></strong>
    <?php
}
?>
  <?php echo $msg; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>