<?php
$idVenda = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT v.*, c.nome AS nomecliente FROM vendas v INNER JOIN clientes c ON v.clientes_id = c.id WHERE v.id=:id";
$stm_sql = $db_connection->prepare($sql);
$stm_sql->bindParam(':id', $idVenda);
$stm_sql->execute();
$venda = $stm_sql->fetch(PDO::FETCH_ASSOC);

$venda['produtos'] = unserialize($venda['produtos']);

$productsName = [];
foreach ($venda['produtos'] as $product) {
    $sql = "SELECT code, nome, vlrVenda FROM produtos WHERE code=:code";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':code', $product);
    $stm_sql->execute();
    $productsName[] = $stm_sql->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="row">
    <div class="col-5 br-2 border-right ml-2">
        <input id="initialValue" value="<?php echo $venda['vlrTotal']; ?>" hidden>
        <div id="diff-input" hidden>0,00</div>
        <p>Produtos:</p>
        <ul class="list-group">
            <?php
            foreach ($productsName as $key => $product) {
            ?>
                <li class="list-group-item">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input productsExchange" type="checkbox" id="exchange-<?php echo $key; ?>" onchange="productsForExchange({
                            code: <?php echo $product['code']; ?>,
                            idInput: 'exchange-<?php echo $key; ?>'
                        });">
                        <label class="form-check-label" for="product-exchange"><?php echo $product['code'] . " - " . $product['nome'] . " - R$" . $product['vlrVenda']; ?></label>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>

    </div>
    <?php
    //include "app/sell/input-products.php";
    ?>
</div>
<div class="row">
    <div class="col-12 ml-2">
        <p id="text-diff-exchange" class="d-inline">
            Diferença: R$
        </p>
        <p id="diff" class="d-inline">0,00</p>
        <button type="button" class="btn btn-light btn-sm" data-toggle="tooltip" title="ATENÇÃO! Isso gerará um saldo na conta do cliente, que poderá ser usado em futuras compras.">Confirmar troca</button>
        
    </div>
</div>


<script>
    $("#vartotal").hide();

    function productsForExchange(options) {
        diff = $("#diff-input").text();
        //newProducts = $("#vartotal").text();
        //newProducts = newProducts.split("$");
        //newProductsVlr = newProducts[1];
        //newProductsVlr = parseInt (newProductsVlr);

        if (diff == "0,00") {
            var diff = 0;
        }
        diff = parseInt(diff);
        jQuery.ajax({
            type: "POST",
            url: "app/products/select-optimized.php",
            data: {
                code: options.code
            },
            success: function(data) {

                data = JSON.parse(data);
                data = data[0];

                if ($("#" + options.idInput).is(":checked")) {
                    diff = diff - parseInt(data['vlrVenda']);
                } else {
                    diff = diff + parseInt(data['vlrVenda']);
                }
                $('#diff-input').html(diff);
                //$('#diff').html(diff + newProductsVlr);
                $("#diff").html(diff);



            }
        });


    }
</script>