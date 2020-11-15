// $(document).ready(function (){
//     $("#salvar").click(function (){
//        var form = new FormData($("#formulario")[0]);
//        $.ajax({
//            url: '../../app/inscliente.php',
//            type: 'post',
//            dataType: 'json',
//            cache: false,
//            processData: true,
//            contentType: false,
//            data: form,
//            timeout: 8000,
//            success: function(resultado){
//                $("#resposta").html(resultado);
//            }
//        });
//     });
// });
$(document).ready(function (){
    $("#salvar").click(function (){
       var form = new FormData($("#formulario")[0]);
       $.ajax({
         $.ajax({
             type: "POST",
             url: "inscliente.php",
             data: { nome: nome },
             success: function (resultado) {
               $("#resposta").html(resultado);
           }
       });
    });
});
$(document).ready(function (){
    $("#salvar").click(function (){
       var form = new FormData($("#formulario")[0]);
       $.ajax({
         $.ajax({
             type: "POST",
             url: "inscliente.php",
             data: { nome: nome },
             success: function (resultado) {
               $("#resposta").html(resultado);
           }
       });
    });
});
// $.ajax({
//     type: "POST",
//     url: "consulta.php",
//     data: { id: idProduto },
//     success: function (resposta) {
//         var dados = JSON.parse(resposta);
//         $('#conteudoModal').html('Produto: ' + dados.nome + 'Valor: ' + dados.valor);
// }
//
// });
