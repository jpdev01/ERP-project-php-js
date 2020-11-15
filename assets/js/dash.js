jQuery(document).ready(function(){
  $('#periodo').change(function(){
    f = $('#g-01').val();
    p = $('#periodo').val();
    jQuery.ajax({
      type: "POST",
      url: "app/reports/graphics.php",
      data: {
        pagina: "vendas",
        periodo: p,
      },
      dataType:"json",
      success: function( data ){

        // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
        grafico_vendas(data);
      }
    });
  });


});

function plan_vendas(){
  p2 = $('#periodo-2').val();
  // $('#periodo-2').show();
  jQuery.ajax({
    type: "POST",
    url: "app/reports/spreadsheets.php",
    data: {
      pagina: "vendas",
      periodo: p2,
    },
    success: function( data ){
      $("#content-dash-2").html(data);
    }
  });
}
