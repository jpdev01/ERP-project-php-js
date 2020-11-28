/*
jQuery("frmins.php").ready(function(){
    var url = window.location.href;
    if (url.indexOf('folder=app/products/&file=frmins.php') > -1)
    {
        setValueCode("#inputCode");
        code = $("#inputCode").val();
        criarCode(code);
}
});
*/

function changeInputCode(){
    code = $("#inputCode").val();
    if (validaCode(code)) {
        alert("Válido");
        $("#inputCode").removeClass("is-invalid");
        $("#inputCode").addClass("is-valid");
    }
    else {
        alert("inválido");
        $("#inputCode").removeClass("is-valid");
        $("#inputCode").addClass("is-invalid");
    }
}


$('#checkInputCode').change(function () {
    $('#inputCode').removeAttr('disabled');
});

function criarCode(input) {
    var code = $("#inputCode").val();
    JsBarcode("#barcode", code);
}

function printCode(codigo) {
    var print = new Promise(function () {
        var container = $('#divCode');
        var width = parseFloat(container.attr("width"));
        var height = parseFloat(container.attr("height"));
        var printWindow = window.open('', 'PrintMap',
            'width=' + width + ',height=' + height);
        printWindow.document.writeln($(container).html());
        printWindow.document.close();
        printWindow.document.close();
        printWindow.print();
        printWindow.close();
        resolve();
    });
    print.then(() => {


    });

}

function setValueCode(input) {
    //ITF-14 ou DUN-14
    //14 dígitos
    jQuery.ajax({
        type: "POST",
        url: "app/products/getCodes.php",
        success: function (data) {
            data = parseInt(data);
            data++;
            $(input).val(data);
        }
    });
}

$('.checkCodeInputMode').on('change', function () {

    if ($(this).val() == 'auto') {
        $("#inputCode").prop("disabled", true);
        geratedCode = gerarCode();
        $("#inputCode").val(geratedCode);
    }
    if ($(this).val() == 'manual') {
        $('#inputCode').removeAttr('disabled');
    }

});

$("form.php").ready(function () {

    defineCode("#inputCode");

});

function defineCode(input) {
    setValueCode(input);
    setTimeout(function () {
        code = $(input).val();
        criarCode("#inputCode");
    }, 500);
}

function validaCode(code) {
    jQuery.ajax({
        type: "POST",
        url: "app/products/getCodes.php",
        data: { code: code },
        success: function (qtde) {
            alert("qtde=" + qtde);
            qtde = parseInt(qtde);
            if (qtde > 0) {
                alert("maior q 0");
                return false;
            }
            alert("retorna true");
            return true;
        }
    });
}