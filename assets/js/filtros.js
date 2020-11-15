function apfiltros(el) {
  document.getElementById("tabs-geral").style.display = el.checked ? "grid" : "none";
}


function load_dados(valores, page, div){
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
    }
  });
}


$(document).ready(function(){
  $('.div-dt-userDes').hide();

  $('#search').keyup(function(){
    search_table($(this).val());
  });
  $('#check-status').change(function(){
    category = $("#category").val();
    provider = $("#provider").val();
    status = $('#check-status').val();
    valores = {
      status: status,
      category: category,
      provider: provider
    };
    // if($("#check-status").is(':checked')){
    //   valores ={status : 0};
    // }
    // else{
    //   valores ={status : 'todos'};
    // }
    load_dados(valores, 'app/products/pesquisa.php', '#content2');
  });
  // $('#check-status-catg').change(function(){
  //   alert('oi');
  //   if($("#check-status-catg").is(':checked')){
  //     search_table("Disponível");
  //   }
  // });
  $('#check-sell-pendente').change(function(){
    var cliente = $('#labelCliente').text();
    var pag = $('#pag').val();
    if($("#check-sell-pendente").is(':checked')){
      valores ={status : "pendente", cliente: cliente, pag: pag};
    } else {
      valores ={status : "todos", cliente: cliente, pag: pag};
    }
    load_dados(valores, 'app/payment/find-buy.php', '#pend-cliente');
  });
  $('#add-product').click(function(){
    load_dados(null, 'app/products/frmins.php', '#div-products');
  });
  $('#add-user').click(function(){
    load_dados(null, 'app/users/frmins.php', '#div-users');
  });
  $('#ativo').change(function(){
    if ($(this).val()=="1"){
      $('.div-dt-userDes').show();
    }else{
      $('.div-dt-userDes').hide();
    }
  });
  $('#add-provider').click(function(){
    load_dados(null, 'app/providers/frmins.php', '#div-providers');
  });
  $('#add-customer').click(function(){
    load_dados(null, 'app/customers/frmins.php', '#div-customers');
  });
  $('#add-category').click(function(){
    load_dados(null, 'app/categories/frmins.php', '#div-categories');
  });
  function search_table(value){
    $('#employee_table tbody tr').each(function(){
      var found = 'false';
      $(this).each(function(){
        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
          found = 'true';
        }
      });
      if(found == 'true')
      {
        $(this).show();
        // var visivel++;
      }
      else
      {
        $(this).hide();
      }
    });
  }
})



//filtros pt 2-->

$(document).ready(function(){
  //Aqui a ativa a imagem de load
  // function loading_show(){
  //     $('#loading').html("<img src='img/loading.gif'/>").fadeIn('fast');
  // }

  //Aqui desativa a imagem de loading
  // function loading_hide(){
  //     $('#loading').fadeOut('fast');
  // }


  // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json

  //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
  load_dados(null, 'app/customers/pesquisa.php', '#MostraPesq');
  load_dados(null, 'app/teller/pesquisa.php', '#see-caixa');
  load_dados(null, 'app/products/pesquisa.php', '#content2');


  //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
  $('.tamanho').change(function(){
    var valores = $('#frm-customers').serialize();//o serialize retorna uma string pronta para ser enviada
    //pegando o valor do campo #pesquisaCliente
    //pegando o valor do campo #pesquisaCliente
    var $valuemin = $('#box-4').val();
    var $valuemax = $('#box-5').val();
    if ($valuemin==""){
      $valuemin=0;
    }
    if ($valuemax==""){
      $valuemax=100;
    }
    if ($valuemin > $valuemax){
      alert("Valores incorretos");
      $("#box-4").val("");
      $("#box-5").val("");
      $("#box-5").focus();
    }else{
      load_dados(valores, 'app/customers/pesquisa.php', '#MostraPesq');
    }
  });

  $('#status').change(function(){
    var valores = $('#frm-customers').serialize();
    load_dados(valores, 'app/customers/pesquisa.php', '#MostraPesq');
  });

  $('#box-10').change(function(){
    var valores = $('#frm-customers').serialize();
    load_dados(valores, 'app/customers/pesquisa.php', '#MostraPesq');
  });





});
// $('#check-status-f').change(function(){
//   var id = $("#fornecedor_id").val();
//   if($("#check-status-f").is(':checked')){
//     providers_products(id, 0);
//   }
//   else{
//     providers_products(id, 'todos');
//   }
//
// });
// $('#check-status-c').change(function(){
//   alert("checkstst");
//   var id = $("#category_id").val();
//   alert(id);
//   if($("#check-status-c").is(':checked')){
//     conteudo('#content', 'categories', 'products', id, 0)
//   }
//   else{
//     conteudo('#content', 'categories', 'products', id, 'todos')
//   }
//
// });
