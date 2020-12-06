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

function changeInputCode() {
    code = $("#inputCode").val();
    id = $("#id").val();
    validaCode(id ,code, (resultado) => {
        if (resultado == 0) {
            $("#inputCode").removeClass("is-invalid");
            $("#inputCode").addClass("is-valid");
            configCode(code);
        } else {
            $("#inputCode").removeClass("is-valid");
            $("#inputCode").addClass("is-invalid");
        }
    });
}


$('#checkInputCode').change(function () {
    $('#inputCode').removeAttr('disabled');
});

function configCode(input) {
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
        defineCode();
        $("#inputCode").val(geratedCode);

    }
    if ($(this).val() == 'manual') {
        $('#inputCode').removeAttr('disabled');
    }

});

$("form.php").ready(function () {
});

function defineCode(input) {
    setValueCode(input);
    setTimeout(function () {
        code = $(input).val();
        configCode("#inputCode");
    }, 500);
}

function validaCode(id, code, callback) {
    if (id){
        dataSend = {
            code: code, 
            id: id
        }
    }else{
        dataSend = {
            code: code
        }
    }
    jQuery.ajax({
        type: "POST",
        url: "app/products/getCodes.php",
        data: dataSend,
        success: function (qtde) {
            callback(qtde);
        }
    });
}