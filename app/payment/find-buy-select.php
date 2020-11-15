
<?php
include "../../security/database/connection.php";
$msg="";
$idv = $_POST['id'];
$sql ="SELECT v.*, c.nome FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:idvenda";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':idvenda', $idv);
$stm_sql-> execute();
$c = $stm_sql->fetch(PDO::FETCH_ASSOC);
// var_dump($c);
// $msg.="<tr>";
?>

<div class="card bg-light mb-3 w-100">
  <div class="card-header"><div class="row no-gutters"><div class="col-md-1">
    <img src="assets/css/bootstrap-icons-1.0.0/bag.svg" class="card-img" alt="pesquisar" width="" height="" title="Bootstrap">
  </div></div></div>
  <div class="card-body">
    <h5 class="card-title">Cliente: <?php echo $c['nome']; ?></h5>
    <p class="card-text">Data da compra: <?php echo date('d/m/Y h:m', strtotime($c['data'])); ?></p>
    <p class="card-text">Forma de pagamento:
    <?php
    if($c['frmPgto']==0){
      $txt = 'Dinheiro';
    }else if($c['frmPgto']=='1'){
      $txt ='Cartão de crédito';
    }
    else if($c['frmPgto']=='2'){
      $txt = 'Cartão de débito';
    }
    else if($c['frmPgto']=='3'){
      $txt = 'Cheque';
    }
    else if($c['frmPgto']=='4'){
      $txt = 'Crediário';
    }
    else if($c['frmPgto']=='5'){
      $txt = 'Depósito/Transferência';
    }
    else{
      $txt = 'Erro ao consultar';
    }
    $txt.=' - ';
    if(['metPgto']==0){
      $txt.= 'A vista';
    }else{
      $txt.= 'Parcelado - '.$c['qtdeParc'].'x';
    }
    echo $txt;
    ?></p>
      <p class="card-text">Valor pago: R$<?php echo $c['vlrPago']; ?></p>
    <p class="card-text">Valor total: R$<?php echo $c['vlrTotal']; ?></p>
      <?php
      if($c['dsc']!=0){
        ?><p class="card-text">Desconto: R$ <?php echo $c['dsc'];?> <p> <?php
      }

      ?>
    <p class="card-text">Produtos: <?php
    $produtos = $c['produtos'];
    $produtos = unserialize($produtos);
    $sql ="SELECT code, nome FROM produtos";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> execute();
    $cp = array();
    $txt='';
    $p = $stm_sql->fetch(PDO::FETCH_ASSOC);
    foreach ($produtos as $produto) {
      if ($produto==$p['code']){
        $cp[]= $p['nome'];
      }
    }
    foreach ($cp as $cpp => $value) {
      $txt.= $value;
      if (isset($cp[$cpp+1])){
        $txt.= ', ';
      }else{
        $txt.='.';
      }
    }
    echo $txt;

    ?></p>
  </div>
</div>
<form action='' method='post' id='ajax_form' name='ajax_form'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="frmpgto">Forma de pagamento</label>
      <select class="form-control" name='frmpgto' id='frmpgto'>
        <option selected>...</option>
        <option value='0'>Dinheiro</option>
        <option value='1'>Cartão de crédito</option>
        <option value='2'>Cartão de débito</option>
        <option value='3'>Cheque</option>
        <option value='4'>Crediário</option>
        <option value='5'>Depósito/Transferência</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="pgto-venda-selec">Valor:</label>
      <input type="number" class="form-control" id="pgto-venda-selec" name='pgto-venda-selec'>
    </div>
  </div>
  <div class="form-group">
    <label for="obs">Observação: </label>
    <input type="text" class="form-control" id="obs" name='obs'placeholder="observação...">
  </div>
  <div class="form-group" hidden>
    <input type="date" class="form-control" id="data" name='data' value="<?php echo date('Y-m-d');?>">
  </div>
  <button type="submit" class="btn btn-primary">Inserir</button>
</form>
<?php
$c = serialize ($c);
setcookie('pgto', $c);
// echo $msg;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
