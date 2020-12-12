<?php
include "../../security/database/connection.php";
include "../../modules/environment.php";

$bandeira = isset($_POST['flag']) ? $_POST['flag'] : 'all';

if (isset($_POST['month'])){
    $mes = $_POST['month'];
    $ano = $_POST['year'];
}
else if (isset($_GET['month'])){
    $mes = $_GET['month'];
    $ano = $_GET['year'];
}
else{
    $mes = Date('m');
    $ano = Date('Y');
}

$date = Date('Y-m-d');

$enterThisMonth = [];
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE (frmPgto=1 OR frmPgto=2)";
if ($bandeira != null && $bandeira != "all"){
    $sql.= " AND bandeira = ".$bandeira." ";
}
$sql.= " ORDER by v.data ASC";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->execute();

$sales = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
$dateOf = date('d/m/Y', strtotime('+' . $mes . ' months'));

foreach ($sales as $sale) {
    $installmentDate = [];
    for ($parcela = 1; $parcela <= $sale['qtdeParc']; $parcela++) {
        //$dateOf = date('d/m/Y', strtotime('+' . $parcela . ' months'));

        $dateOf = new DateTime($sale['data']);
        $dateOf->add(new DateInterval('P' . $parcela . 'M'));
        $dateOf = $dateOf->format('d/m/Y');

        $installmentDate[] = $dateOf;
    }

    foreach ($installmentDate as $key => $installment) {
        //$date = $installment->format('m');
        $installmentRep = explode("/", $installment);
        if ($mes == $installmentRep[1] && $ano == $installmentRep[2]) {
            $sale['data'] = $installment;
            $sale['numParcela'] = $key + 1;
            $enterThisMonth[] = $sale;
        }
    }
}

?>
<input id="input-year" value="<?php echo $ano; ?>" hidden>
<input id="input-month" value="<?php echo $mes; ?>" hidden>
<?php

foreach ($enterThisMonth as $key => $venda) {
    //$thisDate = date('d/m/Y', strtotime($venda['data'] . '+' . $mes . ' month'));
    $thisDate = $venda['data'];
    $thisParcela = $venda['numParcela'];
    $thisValue = $venda['vlrTotal'] / $venda['qtdeParc'];
    if ($venda['bandeira'] == null) {
        $thisFlag = "";
    } else {
        foreach ($FLAGS as $key => $flag) {
            if ($venda['bandeira'] == $key) {
                $thisFlag = $flag;
            }
        }
    }
    if ($venda['frmPgto'] == 1) {
        $thisFrmPgto = "Cred.";
    } else {
        $thisFrmPgto = "Deb.";
    }

    
?>
    <tr onclick="openModal('app/sell/focus.php', {vendaid: '<?php echo $venda['id']; ?>'}, '', {titulo: 'Descrição da Compra', tamanho: 'md', searchbar: 'false', filter: 'false', 
              htmlModal: '#htmlModal', button: 'btnModal'})">
        <td><?php echo $thisDate; ?></td>
        <td><?php echo 'R$' . $thisValue; ?></td>
        <td><?php echo $thisParcela . "/" . $venda['qtdeParc']; ?></td>
        <td><?php echo $thisFlag . "/" . $thisFrmPgto; ?></td>
        <td>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
        </td>
    </tr>
<?php
}
?>