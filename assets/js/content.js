

function conteudo(div, pasta, arquivo, id, cont2, filtro){
  if ($('#staticBackdrop').is(':visible')){
    console.log("Retirando modal da tela...");
    document.getElementById("btnModal").click();
  }
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
  viewCustomerHistory();
});

function query(data, callback, div){
  jQuery.ajax({
    type: "POST",
    url: "modules/requisitions-api.php",
    data: {data: data},
    success: function( data ){
      alert(data);
      if(callback){
        callback();
      }
      else if(div){
        $(div).html(data);
      }
    }
  });
}

function build(div, component, options){
  jQuery.ajax({
    type: "POST",
    url: "modules/"+component+"-service.php",
    data: {options},
    success: function( data ){
      $(div).html(data);
    }
  });
}

function redirect(pag, args){
    location.href = (pag + "&idcliente=" + args['idcliente'] + "&nomecliente=" + args['nomecliente'] + "&idvenda=" + args['idvenda']);
}

function changeSeeHis(){
  viewCustomerHistory();
}

function viewCustomerHistory(){
  nomecliente = $('#cliente').val();
  pag = $('#pag').val();
  view = $('#view').val();
  jQuery.ajax({
    type: "POST",
    url: "app/payment/find-buy.php",
    data: {
      cliente: nomecliente,
      modal: 'true',
      pag: pag,
      view: view
    },
    success: function( data ){
      $("#pend-cliente").html(data);
    }
  });
  //return false;
}