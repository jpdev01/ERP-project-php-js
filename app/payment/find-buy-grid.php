<!-- <div class="card border-success m-3" style="max-width: 15rem;"> -->

<div class="card border-dark m-1 col-md-2 p-0" style="max-width: 15rem;">
  <div class="card-header bg-transparent border-dark"><?php echo $compra["data"]; ?></div>
  <div class="card-body text-dark">
    <!-- <h5 class="card-title">Success card title</h5> -->
    <p class="card-text">
        


    </p>
  </div>
  <div class="card-footer bg-transparent border-dark">
      <?php
        if($compra['vlrPago'] == $compra['vlrTotal']){
        ?>
          <p>Pago</p>
        <?php
        }else{
          if ($pag == "customers") {
            ?>
            <p onclick="redirect('main.php?folder=app/payment/&file=frmins.php', {
              idcliente: '<?php echo $compra['clientes_id']; ?>', 
              nomecliente: '<?php echo $compra['nomecliente']; ?>',
              idvenda: '<?php echo $compra['id']; ?>',
              view: 'list'
              })"><input type='radio' name='radio-pgto-venda-selec'>Selecionar</p>
            <?php
          }else{
            ?>
            <p><input type='radio' name='radio-pgto-venda-selec' onchange="select_venda(<?php echo $compra['id'];?>)">Selecionar</p>
            <?php
          }
        }
            ?>
  </div>
</div>  