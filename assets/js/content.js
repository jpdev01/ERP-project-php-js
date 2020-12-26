

function conteudo(div, pasta, arquivo, id, cont2, filtro){
  $("#all-filters").hide();
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
  //$('#pend-customer-grid').hide();
  //$('#table').hide();
  view = "list";
  console.log("iniciando historic.php");
  viewCustomerHistory();
});

$("form.php").ready(function(){
  $('.inputGroupFamily').hide();
});

function query(data, callback, div){
  jQuery.ajax({
    type: "POST",
    url: "modules/requisitions-api.php",
    data: {data: data},
    success: function( data ){
      
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
  console.log("view = " + view);
  if (view == "grid")
  {
    $('#table').hide();
    $('#pend-customer-grid').show();
    div = "#pend-customer-grid";
  }
  else if (view == "list")
  {
    $('#table').show();
    $('#pend-customer-grid').hide();
    div = "#pend-customer-table";
  }
  else
  {
    $('#table').show();
    $('#pend-customer-grid').hide();
    div = "#pend-customer-table";
  }
  
  jQuery.ajax({
    type: "POST",
    url: "app/payment/find-buy.php",
    data: {
      cliente: nomecliente,
      modal: 'true',
      pag: pag,
      view: view
    },
    success: function( data )
    {
      $(div).html(data);
    }
  });
  //return false;
}

function addFamily(){

  elementHtml = ".inputGroupFamily";
  if($( elementHtml).is( ":visible" )){
    $(elementHtml).hide();
  }else{
    $(elementHtml).show();
  }
}

function redirectToLibraryPage(){
  var pathname = window.location.href;
    pathname = pathname.split("folder=");
    pathname = pathname[1].split("/&");
    pathname = pathname[0];
    if (pathname.indexOf("exchange") !== -1){
      pathname = "app/sell";
    }
    window.location.href = "main.php?folder=" + pathname + "/&file=library.php";
}