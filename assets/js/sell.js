jQuery(document).ready(function(){
  scanner(null, 'app/sell/viewproducts.php', '#products');
  $("#cmp_parc").hide();
  $("#cmp_entrada").hide();
  $("#cmp_desc").hide();
  $("#btn_view_parcels").hide();
  $("#flagField").hide();
  // scanner(null, 'app/sell/viewproducts.php', '#products');
  //----------------------scanner parte de vendas-----------------------------------
  //se está no modo scanner ou teclado
  jQuery('.box-mode').change(function(){
    var box_mode = $('#box-scannercode').prop("checked");
    if(box_mode==false){
      alert("Código de barras via teclado ativado");
      // $("#confirmed").show();//deixa o botão de submit visível
      var mode = 1;
    }
    else{
      alert("Código de barras via CodeBar ativado");
      // $("#confirmed").hide();//deixa o botão de submit invisível
      var mode = 0;
    }
  });
  // function load_dados(valores, page, div){
  //   $.ajax({
  //     type: 'POST',
  //     dataType: 'html',
  //     url: page,
  //     // beforeSend: function(){//Chama o loading antes do carregamento
  //     //       loading_show();
  //     // },
  //     data: valores,
  //     success: function(msg){
  //       // loading_hide();
  //       var data = msg;
  //       $(div).html(data).fadeIn();
  //     }
  //   });
  // }
  //se o input receber o código via scanner
  jQuery('#code').keyup(function(){
    var mode = $('#box-scannercode').prop( "checked" );
    if(mode==true){
      var valores = jQuery( this ).serialize();
      var $parametro = $('#code').val();
      if($parametro.length >= 1){
        scanner(valores, 'app/sell/viewproducts.php', '#products');
      }
      else{
        scanner(null, 'app/sell/viewproducts.php', '#products');
      }
      jQuery( this ).val("");
      jQuery( this ).focus();
      return false;
    }
  });
  function getCookie(name) {
    var cookies = document.cookie;
    var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);

    if (begin == -1) {

      begin = cookies.indexOf(prefix);

      if (begin != 0) {
        return null;
      }

    } else {
      begin += 2;
    }

    var end = cookies.indexOf(";", begin);

    if (end == -1) {
      end = cookies.length;
    }

    return unescape(cookies.substring(begin + prefix.length, end));
  }
  function setCookie(name,value,days) {//sem teste
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }
  function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
  }

  //se o input receber o código via submit(teclado)
  jQuery('#ajax_form_scan').submit(function(){
    var valores = jQuery( this ).serialize();
    var $parametro = $('#code').val();
    if($parametro.length >= 1){
      scanner(valores, 'app/sell/viewproducts.php', '#products');
    }
    else{
      scanner(null, 'app/sell/viewproducts.php', '#products');
    }
    jQuery('#code').val("");
    jQuery('#code').focus();
    return false;

  });
  jQuery('#descCheck').change(function(){
    if($("#descCheck").is(':checked')){
      $("#cmp_desc").show();
    } else {
      $("#cmp_desc").hide();
      $("#desc").val('0');
      // desconto();
    }
  });


  jQuery('#condCheck').change(function(){
    if($("#condCheck").is(':checked')){
      $(".venda").hide();
      $("#cmp_parc").hide();
      $("#cmp_parc").val("1");
      $("#cmp_entrada").hide();
      $("#cmp_parc").val("0");
      $("#cmp_desc").hide();
      $("#cmp_desc").val("0");
    } else {
      $(".venda").show();
      // $("#desc").val('0');
      // desconto();
    }
  });
  jQuery('#desc').keyup(function(){
    desconto();
  });
  function desconto(){
    var desconto = jQuery('#desc').val();
    var desconto = parseFloat(desconto);
    var vartotal = Cookies.get("sell");
    var varfinal = vartotal-desconto;
    varfinal = vartotal-desconto;
    if (isNaN(varfinal)){
      varfinal = vartotal;
    }
    $("#varfinal").text("Valor final: R$"+varfinal);
    // setCookie('codes', varfinal, null);
  }
  //trabalha com os dados recebidos pelo scanner
  function scanner(valores, page, div){
    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: page,
      // beforeSend: function(){//Chama o loading antes do carregamento
      //       loading_show();
      // },
      data: valores,
      success: function(msg){
        // loading_hide();
        var data = msg;
        $(div).html(data).fadeIn();
        var vartotal = Cookies.get("sell");
        jQuery('#vartotal').text("Valor total: R$"+vartotal);
        desconto();
        Cookies.set('explodesell', 'none', null, '/');
      }
    });
  }

  $("#metPgto").on("change", function () {
    if($("#metPgto").val()=='1'){
      $("#cmp_parc").show();
      $("#cmp_entrada").show();
      //$("#btn_view_parcels").show();
    }else{
      $("#cmp_parc").hide();
      $("#cmp_entrada").hide();
      $("#qtdeparc").val('1');
      //$("#btn_view_parcels").hide();
    }
  });

  $("#frmpgto").on("change", function () {
    val = $("#frmpgto").val();
    if(val == 1 || val == 2){
      $("#flagField").show();
    }else{
      $("#flagField").hide();
      $("#flagField").val('');
    }
  });


  $("#box-avista").on("change", function () {
    $("#div-parcelas").hide();
  });
  jQuery('#e_compra').click(function(){
    resp = confirm("Deseja reiniciar a compra? ");
    if (resp==true){
      alert("excluindo...");
      Cookies.set('explodesell', 'yes', null, '/');
      $("#cliente").val("");
      scanner(null, 'app/sell/viewproducts.php', '#products');
    }
  });

  $("#btn_view_parcels").on("click", function () {
    openModal('app/sell/view_parcels.php', {}, '', {titulo: 'Visualização das Parcelas', tamanho: 'md', searchbar: 'false', filter: 'false', 
              htmlModal: '#htmlModal', button: 'btnModal'})
  });
  //
});
//acaba ajax
function remove_prod_sell(code){
  $.ajax({
    type: 'POST',
    dataType: 'html',
    url: 'app/sell/viewproducts.php',
    // beforeSend: function(){//Chama o loading antes do carregamento
    //       loading_show();
    // },
    data: {scannercode: code, funcao: "exclude"},
    success: function(msg){
      var data = msg;
      $('#products').html(data).fadeIn();
      var vartotal = Cookies.get("sell");
      jQuery('#vartotal').text("Valor total: R$"+vartotal);
      var desconto = jQuery('#desc').val();
      var desconto = parseFloat(desconto);
      var vartotal = Cookies.get("sell");
      var varfinal = vartotal-desconto;
      varfinal = vartotal-desconto;
      if (isNaN(varfinal)){
        varfinal = vartotal;
      }
      $("#varfinal").text("Valor final: R$" + varfinal);
      Cookies.set('explodesell', 'none', null, '/');
    }
  });
}
function delivery_venda(id_delivery){
  jQuery.ajax({
    type: "POST",
    url: "app/sell/frmins.php",
    data: {delivery: id_delivery},
    success: function( data ){
      window.location = "main.php?folder=app/sell/&file=frmins.php";
    }
  });
}
function select_cliente(id, cliente){
  $("#cliente").val(id);
  $("#labelCliente").text(cliente);
  $("#nomeCliente").val(cliente);
  jQuery.ajax({
    type: "POST",
    url: "app/payment/find-buy.php",
    data: {cliente: cliente, view: 'list'},
    success: function( data ){
      $("#pend-customer-table").html(data);
    }
  });

  // $('#exampleModal').modal('hide');
}

