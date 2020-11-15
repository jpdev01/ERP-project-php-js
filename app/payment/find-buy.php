
<?php
include "../../security/database/connection.php";
$status = (!empty($_POST['status']))?$_POST['status']:null;
$msg="";
$cliente = (!empty($_POST['cliente']))?$_POST['cliente']:null;
$pag = (!empty($_POST['pag']))?$_POST['pag']:null;
if($cliente==null){
  ?>
  <tr>
    <td colspan='3'>Nenhum cliente encontrado!</td>
  </tr>
  <?php
}else{
  $sql = "SELECT v.*, c.nome FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id AND c.nome=:cliente";
  if ($status=="pendente"){
    $sql.= ' AND v.vlrPago<>v.vlrTotal';
  }
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':cliente', $cliente);
  $stm_sql-> execute();
  $compras = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

  foreach ($compras as $compra) {
    if ($pag=="customers"){
      ?>
      <tr onclick="conteudo('#content2', 'sell', 'focus', '<?php echo $compra['id'];?>', '')">
        <?php
      }else{
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
        if($compra['vlrPago']==$compra['vlrTotal']){
          ?>
          <td>Pago</td>
          <?php
        }else{
          if ($pag == "customers") {
            ?>
            <td>Pendente</td>
            <?php
          }else{
            ?>
            <td><input type='radio' name='radio-pgto-venda-selec' onchange='select_venda("<?php echo $compra['id'];?>")'>Selecionar</td>
            <?php
          }
        }
        ?>
      </tr>";
      <?php
    }
  }
  ?>
