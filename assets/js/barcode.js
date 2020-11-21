jQuery("frmins.php").ready(function(){
    var url = window.location.href;
    if (url.indexOf('folder=app/products/&file=frmins.php') > -1)
    {
        setValueCode("#inputCode");
        code = $("#inputCode").val();
        criarCode(code);
}
});
$('#inputCode').change(function(){
    code = $("#inputCode").val();
    criarCode(code);
});

$('#checkInputCode').change(function(){
    $('#inputCode').removeAttr('disabled');
});

function criarCode(input){
    var code = $("#inputCode").val();
    JsBarcode("#barcode", code);
}

function printCode(codigo){
    var print = new Promise(function(){
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

function setValueCode(input){
    //ITF-14 ou DUN-14
    //14 dígitos
    jQuery.ajax({
        type: "POST",
        url: "app/products/getCodes.php",
        success: function( data ){
          data = parseInt(data);
          data++;
            $(input).val(data);
        }
      });
    $(input).val(0);
}
