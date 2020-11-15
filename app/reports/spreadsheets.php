<?php
include '../../security/database/connection.php';
$pagina   = ($_POST['pagina']!="")?$_POST['pagina']:null;
// $temp = ($_POST['periodo']!="")?$_POST['periodo']:null;

date_default_timezone_set('America/Sao_Paulo');
$data = Date('Y-m-d', time());
?>
<div class="my-custom-scrollbar my-custom-scrollbar-primary container">
  <div class='table-responsive container'>
    <table class='table table-striped table-hover table-sm container'>
      <thead class='thead-dark rounded'>
        <tr>
          <?php
          if ($pagina=="vendas"){
            ?>
            <th class="th-sm" colspan="3" scope='col'>Data</th>
            <th class="th-sm" scope='col'>Cliente</th>
            <th class="th-sm" scope='col'>Valor total</th>
            <th class="th-sm" scope='col'>Desconto</th>
            <th class="th-sm" scope='col'>Pagamento</th>
            <th class="th-sm" scope='col'>Valor pendente</th>
            <th class="th-sm" scope='col'>Produtos</th>
            <?php
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $periodo=array();
        $periodo["fim"]=$data;
        $mes = date('m');
        $ano = date('Y');
        $dia = date('d') - 7;
        $data = mktime(0,0,0,$mes,$dia,$ano);
        $periodo["inicio"]=date('Y-m-d',$data);
        $sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE data BETWEEN :data1 AND :data2";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql-> bindParam(':data1', $periodo['inicio']);
        $stm_sql-> bindParam(':data2', $periodo['fim']);
        $stm_sql -> execute();
        $vendas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($vendas as $venda) {
          if ($venda['metPgto']==0){
            $venda['metPgto']="A vista";
            $venda['qtdeParc']="";
            $venda["pend"]="---";
          }else{
            $venda['metPgto']="Parcelado";
            $venda["qtdeParc"]=" (".$venda["qtdeParc"]."x)";
            $venda["pend"]="R$".$venda["vlrTotal"]-$venda["vlrPago"];
          }
          if ($venda['frmPgto']==0){
            $venda['frmPgto'] = "Dinheiro";
          }else if ($venda['frmPgto']==1){
            $venda['frmPgto'] = "Cartão de crédito";
          }else if ($venda['frmPgto']==2){
            $venda['frmPgto'] = "Cartão de débito";
          }else if ($venda['frmPgto']==3){
            $venda['frmPgto'] = "Cheque";
          }
          else if ($venda['frmPgto']==4){
            $venda['frmPgto'] = "Crediário";
          }else if ($venda['frmPgto']==5){
            $venda['frmPgto'] = "Depósito/transferência";
          }
          if($venda["dsc"]==0){
            $venda["dsc"]="---";
          }else{
            $venda["dsc"]="R$".$venda["dsc"];
          }
          ?>
          <tr>
            <td colspan="3"><?php echo $venda['data']; ?> </td>
            <td><?php echo $venda['nomecliente']; ?> </td>
            <td>R$<?php echo $venda['vlrTotal']; ?> </td>
            <td><?php echo $venda['dsc']; ?> </td>
            <td><?php echo $venda['metPgto']." / ".$venda['frmPgto'].$venda['qtdeParc']; ?> </td>
            <td><?php echo $venda['pend']; ?> </td>
            <td><?php echo "oi"; ?> </td>
          </tr>
          <?php
        }
        ?>

      </tbody>
    </table>
  </div>
</div>

<!--

</div> -->
<!-- <div class="col-sm-4" id='div-customer'>

</div> -->
<!-- </div>
</div> -->
