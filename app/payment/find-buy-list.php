<?php
if ($pag=="customers"){
      if($modal=="true"){
        ?>
        <tr onclick="openModal('app/sell/focus.php', {vendaid: '<?php echo $compra['id'];?>'}, '', {titulo: 'Descrição da Venda', searchbar: 'false', filter: 'false', tamanho: 'md', htmlModal: '#htmlModal', button: 'btnModal' })">
        <?php
      }
      else{
        ?>
        <tr onclick="conteudo('#content2', 'sell', 'focus', '<?php echo $compra['id'];?>', '')">
        <?php
      }
      }
      else{
        ?>
        <tr>
          <?php
        }
        ?>
        <td><?php echo $compra['data']; ?></td>
        <td>R$<?php echo $compra['vlrTotal'];?></td>
        <td><?php echo $compra['qtdeParc'];?>x</td>
        <td>R$ <?php echo $compra['dsc'];?></td>
        <td>R$ <?php echo $compra['vlrPago'];?></td>
        <?php
        if($compra['vlrPago'] == $compra['vlrTotal']){
          ?>
          <td>Pago</td>
          <?php
        }else{
          if ($pag == "customers") {
            ?>
            <td onclick="redirect('main.php?folder=app/payment/&file=frmins.php', {
              idcliente: '<?php echo $compra['clientes_id']; ?>', 
              nomecliente: '<?php echo $compra['nomecliente']; ?>',
              idvenda: '<?php echo $compra['id']; ?>'
              })"><input type='radio' name='radio-pgto-venda-selec'>Selecionar</td>
            <?php
          }else{
            ?>
            <td style="font-size: 10px;"><input style="" type='radio' name='radio-pgto-venda-selec' onchange="select_venda(<?php echo $compra['id'];?>)">Selecionar</td>
            <?php
          }
        }
        ?>
      </tr>