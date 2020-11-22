
<?php
include "../../security/database/connection.php";
$status = (!empty($_POST['status']))?$_POST['status']:null;
$msg="";
$cliente = (!empty($_POST['cliente']))?$_POST['cliente']:null;
$modal = (!empty($_POST['modal'])) ? $_POST['modal'] : null;
$pag = (!empty($_POST['pag']))?$_POST['pag']:null;
/*
$idcliente = (isset($_POST['idcliente'])) ? $_POST['idcliente'] : '';
$nomecliente = (isset($_POST['nomecliente'])) ? $_POST['nomecliente'] : '';
$idvenda = (isset($_POST['idvenda'])) ? $_POST['idvenda'] : '';
*/
if($cliente==null){
  ?>
  <tr>
    <td colspan='3'>Nenhum cliente ou compra encontrada!</td>
  </tr>
  <?php
}else{
  $sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id AND c.nome=:cliente";
  if ($status=="pendente"){
    $sql.= ' AND v.vlrPago<>v.vlrTotal';
  }
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':cliente', $cliente);
  $stm_sql-> execute();
  $compras = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

  foreach ($compras as $compra) {
    if ($pag=="customers"){
      if($modal=="true"){
        ?>
        <tr onclick="openModal('app/sell/focus.php', {vendaid: '<?php echo $compra['id'];?>'}, '', {titulo: 'Descrição da Venda', searchbar: 'false', filter: 'false', tamanho: 'md'})">
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
        <td><?php echo date('d/m/Y h:m', strtotime($compra['data']));?></td>
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
            <td><input type='radio' name='radio-pgto-venda-selec' onchange="select_venda(<?php echo $compra['id'];?>)">Selecionar</td>
            <?php
          }
        }
        ?>
      </tr>";
      <?php
    }
  }
  ?>
