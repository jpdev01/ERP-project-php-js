function productExchange(venda) {
    href = 'main.php?folder=app/sell/exchange/&file=frmins.php';
    params = '&id=' + venda['idVenda'];
    location.href = href + params;
}

function confirmExchange() {
    classOfInput = "productsExchange";
    inputs = document.getElementsByClassName(classOfInput);

    exchangeListConfirmed = [];
    for (i = 0; i <= inputs.length - 1; i++) {
        input = document.getElementsByClassName(classOfInput)[i].id;
        if ($("#" + input).is(":checked")) {
            code = inputs[i].value;
            exchangeListConfirmed.push(code);
        }
    }
    jQuery.ajax({
        type: "POST",
        url: "app/sell/exchange/ins.php",
        data: {
            codes = exchangeListConfirmed
        },
        success: function (data) {
            prepareNotice(data);
        }
    });
}


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
        success: function (data) {

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