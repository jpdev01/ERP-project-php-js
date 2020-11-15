

function conteudo(div, pasta, arquivo, id, cont2, filtro){
  var category = "";
  var provider= "";
  if (pasta=="categories" && arquivo=="products"){
    pasta = "products";
    arquivo = "pesquisa";
    category = id;
    $("#category").val(category);
  }
  else if (pasta=="providers" && arquivo=="products"){
    pasta = "products";
    arquivo = "pesquisa";
    provider = id;
    $("#provider").val(provider);
  }
  jQuery.ajax({
    type: "POST",
    url: "app/"+ pasta +"/"+arquivo+".php",
    data:{
      id: id,
      filtro: filtro,
      category: category,
      provider: provider
    },
    success: function( data ){
      $(div).html(data);
    }
  });
}
$(document).ready(function(){

  // $("body").addClass(function(){
  //           return "myscroll" ;
  //           return "h-100";
  //   });
  $('#check-status-c').change(function(){
    var id = $("#category_id").val();
    if($("#check-status-c").is(':checked')){
      conteudo('#content2', 'categories', 'products', id, 0)
    }
    else{
      conteudo('#content2', 'categories', 'products', id, 'todos')
    }

  });
});
$("historic.php").ready(function(){
  nomecliente = $('#cliente').val();
  pag = $('#pag').val();
  jQuery.ajax({
    type: "POST",
    url: "app/payment/find-buy.php",
    data: {
      cliente: nomecliente,
      pag: pag
    },
    success: function( data ){
      $("#pend-cliente").html(data);
    }
  });
  return false;
});
