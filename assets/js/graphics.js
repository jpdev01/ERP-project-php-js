function grafico_vendas(valores){
  var periodo = valores['periodo'];
  var datas = valores['datas'];
  var qtde_vendas = valores['qtde_vendas'];
  var ctx = document.getElementsByClassName('line-chart');
  //tipo de grafico, data(dados) e opções
  var chartGraph = new Chart(ctx, {
    type: 'line',
    data: {
      labels: periodo,
      datasets: [
        {
          label: "Número de vendas",
          data: qtde_vendas,
          borderWidth: 3,
          borderColor: 'rgba(77, 166, 253, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "RELATÓRIO DE VENDAS (PEDIDOS DE VENDA)"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}


function grafico_categories(dados){
  categorias_nomes = dados['nomecategorias'];
  pcat = dados['p_categorias'];

  var qtdes=[];
  var categorias=[];
  for (var i = 0; i < categorias_nomes.length; i++) {
    categoria = categorias_nomes[i];
    // categorias.push= {categoria: categoria};
    qtde = pcat.count(categoria);
    if(qtdes.length == 0){
      qtdes[i] = [qtde];
    }else{
      qtdes[i]= [qtde];
    }
  }

  var ctx = document.getElementsByClassName('line-chart');
  var chartGraph = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: categorias_nomes,
      datasets: [
        {
          label: "Quantidade de produtos",
          data: qtdes,
          borderWidth: 3,
          borderColor: 'rgba(255, 0, 0, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "NÚMERO DE PRODUTOS VENDIDOS POR CATEGORIA"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}


function graf_prod_categorias(dados){
  categorias_nomes = dados['nomecategorias'];
  pcat = dados['p_categorias'];

  var qtdes=[];
  var categorias=[];
  for (var i = 0; i < categorias_nomes.length; i++) {
    categoria = categorias_nomes[i];
    qtde = pcat.count(categoria);
    if(i==0){
      qtdes = [qtde];
    }else{
      qtdes[i]= [qtde];
    }

  }


  var ctx = document.getElementsByClassName('line-chart');
  var chartGraph = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: categorias_nomes,
      datasets: [
        {
          label: "Quantidade de produtos",
          data: qtdes,
          borderWidth: 3,
          borderColor: 'rgba(255, 0, 0, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "NÚMERO DE PRODUTOS DISPONÍVEIS POR CATEGORIA"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}

function grafico_fornecedores(dados){
  fornecedores_nomes = dados['nomefornecedores'];
  pcat = dados['p_fornecedores'];

  var qtdes=[];
  var fornecedores=[];
  for (var i = 0; i < fornecedores_nomes.length; i++) {
    fornecedor = fornecedores_nomes[i];
    // categorias.push= {categoria: categoria};
    qtde = pcat.count(fornecedor);
    if(i==0){
      qtdes = [qtde];
    }else{
      qtdes[i]= [qtde];
    }

  }


  var ctx = document.getElementsByClassName('line-chart');
  var chartGraph = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: fornecedores_nomes,
      datasets: [
        {
          label: "Quantidade de produtos",
          data: qtdes,
          borderWidth: 3,
          borderColor: 'rgba(255, 0, 0, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "NÚMERO DE PRODUTOS VENDIDOS POR FORNECEDOR"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}

function graf_prod_fornecedores(dados){
  var fornecedores_nomes = dados['nomefornecedores'];
  var pcat = dados['p_fornecedores'];

  var qtdes=[];
  var fornecedores=[];
  for (var i = 0; i < fornecedores_nomes.length; i++) {
    fornecedor = fornecedores_nomes[i];
    // categorias.push= {categoria: categoria};
    qtde = pcat.count(fornecedor);
    if(i==0){
      qtdes[i] = [qtde];
    }else{
      qtdes[i]= [qtde];
    }

  }


  var ctx = document.getElementsByClassName('line-chart');
  var chartGraph = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: fornecedores_nomes,
      datasets: [
        {
          label: "Quantidade de produtos",
          data: qtdes,
          borderWidth: 3,
          borderColor: 'rgba(255, 0, 0, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "PRODUTOS DISPONÍVEIS POR FORNECEDOR"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}


function graf_frmPgto(dados){
  var pcat =[0, 1, 2, 3, 4, 5];
  var qtdes=[0, 0, 0, 0, 0];
  var frmPgto=[];
  for (var i = 0; i < pcat.length; i++) {

    for (var j = 0; j < dados.length; j++) {

      if (dados[j]==i){
        qtdes[i]++;
      }

    }

  }

  qtde = pcat.count(frmPgto);
  if(i==0){
    qtdes = [qtde];
  }else{
    qtdes[i]= [qtde];
  }
  var ctx = document.getElementsByClassName('line-chart');
  var chartGraph = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Dinheiro", "Cartão de crédito", "Cartão de débito", "Cheque", "Crediário", "Depósito/Transferência"],
      datasets: [
        {
          label: "Formas de pagamento (vendas)",
          data: qtdes,
          borderWidth: 3,
          borderColor: 'rgba(255, 0, 0, 0.85)',
          backgroundColor: 'transparent',
        },
      ]
    },
    options: {
      title: {
        display: true,
        fontSize: 20,
        text: "NÚMERO DE VENDAS POR FORMA DE PAGAMENTO"
      },
      labels: {
        fontStyle: "bold"
      },
      scales: {
        yAxes: [{
          display: true,
          ticks: {
            beginAtZero: true,
          }
        }]
      }
    },

  });
}
jQuery("dashboard.php").ready(function(){
  $('#periodo').hide();
  $('#periodo-2').hide();
  $('#g-01').change(function(){
    f = $('#g-01').val();
    p = $('#periodo').val();
    if (f==1){
      $('#periodo').show();
    }else{
      $('#periodo').hide();
    }
    if(f==0){

    }
    else if(f==1){

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
    }
    else if(f==2){
      jQuery.ajax({
          type: "POST",
          url: "app/reports/spreadsheets.php",
          data: {
            pagina: "categorias",
            periodo: p,
          },
          dataType:"json",
          success: function( data ){
            // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
            grafico_categories(data);
          }
        });
    }
    else if(f==3){
        jQuery.ajax({
          type: "POST",
          url: "app/reports/graphics.php",
          data: {
            pagina: "fornecedores",
            periodo: p,
          },
          dataType:"json",
          success: function( data ){
            // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
            grafico_fornecedores(data);
          }
        });
    }
    else if(f==4){
      jQuery.ajax({
          type: "POST",
          url: "app/reports/graphics.php",
          data: {
            pagina: "frmpgto",
            periodo: p,
          },
          dataType:"json",
          success: function( data ){
            // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
            graf_frmPgto(data);
          }
        });
    }
    else if(f==5){
        jQuery.ajax({
          type: "POST",
          url: "app/reports/graphics.php",
          data: {
            pagina: "produtos por categorias",
            periodo: p,
          },
          dataType:"json",
          success: function( data ){
            // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
            graf_prod_categorias(data);
          }
        });
    }
    else if(f==6){
        jQuery.ajax({
          type: "POST",
          url: "app/reports/graphics.php",
          data: {
            pagina: "produtos por fornecedores",
            periodo: p,
          },
          dataType:"json",
          success: function( data ){
            // $("#thead").html("<tr><th>ID</th><th>Valor</th><th>Data</th><th>Cliente</th></tr>");
            graf_prod_fornecedores(data);
          }
        });
    }
  });

  $("#print").on('click', function(e){
    e.preventDefault();

    var Can = new Array();
    $('canvas').each(function(index, el){
      Can[index] = $(el)[0].toDataURL('image/png');
    });

    var windowContent = '<!DOCTYPE html>';
    windowContent += '<head><title>Imprimir relatório</title></head>';
    windowContent += '<body>';

    for(var x = 0; x <= Can.length - 1; x++)
    windowContent += '<img src = "' + Can[x] + '" style="position: absolute; left: 0; top: 0;">';

    windowContent += '</body>';
    windowContent += '</html>';
    var printWin = window.open('', '', width = 100, height = 100);
    printWin.document.open();
    printWin.document.write(windowContent);
    printWin.document.close();
    printWin.focus();
    printWin.print();
  });
});
