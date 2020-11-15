
function see_customer(id){
  jQuery.ajax({
    type: "POST",
    url: "app/customers/board.php",
    data:{
      id: id
    },
    success: function( data ){
      $("#div-customer").html(data);
    }
  });
}
// function valDel(oque, qual){
//   resp = confirm("Deseja excluir o(a) " + oque + ": " + qual + "? ");
//   alert(resp);
//   if(oque=="usuário"){
//     if(resp=='true'){
//       alert('oi');
//     }
//   }
// }
// function valAlt(oque, qual){
//   resp = confirm("Deseja alterar o(a) " + oque + ": " + qual + "? ");
//   return resp;
// }
