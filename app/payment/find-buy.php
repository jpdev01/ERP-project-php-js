
<?php
include "../../security/database/connection.php";
$status = (!empty($_POST['status']))?$_POST['status']:null;
$msg="";
$cliente = (!empty($_POST['cliente']))?$_POST['cliente']:null;
$modal = (!empty($_POST['modal'])) ? $_POST['modal'] : null;
$pag = (!empty($_POST['pag']))?$_POST['pag']:null;
$view = (isset($_POST['view'])) ? $_POST['view'] : 'list';
/*
$idcliente = (isset($_POST['idcliente'])) ? $_POST['idcliente'] : '';
$nomecliente = (isset($_POST['nomecliente'])) ? $_POST['nomecliente'] : '';
$idvenda = (isset($_POST['idvenda'])) ? $_POST['idvenda'] : '';
*/

if($cliente == null){
  ?>
    Nenhum cliente ou compra encontrada!
  <?php
}else
{
  $sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id AND c.nome=:cliente";
  if ($status=="pendente"){
    $sql.= ' AND v.vlrPago<>v.vlrTotal';
  }
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':cliente', $cliente);
  $stm_sql-> execute();
  $compras = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

  

    if ($view == "list")
    {
      foreach ($compras as $key => $compra) {
        $compra['data'] = date('d/m/Y h:m', strtotime($compra['data']));
        include "find-buy-list.php";
      }
      
    }
    else if ($view == "grid")
    {
      ?>
      <div class="row row-cols-1 row-cols-md-2">
        <?php
      foreach ($compras as $key => $compra) {
        $compra['data'] = date('d/m/Y h:m', strtotime($compra['data']));
        include "find-buy-grid.php";
      }
      ?>
      </div>
      <?php
    }
  }
?>