jQuery(document).ready(function () {

  $("#cep").focusout(function () {
    //Início do Comando AJAX
    $.ajax({
      //url que diz onde sera pego as informações
      //concatenei o valor digitado no CEP
      url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
      //Aqui você deve preencher o tipo de dados que será lido,
      //no caso, estamos lendo JSON.
      dataType: 'json',
      //SUCESS é referente a função que será executada caso
      //ele consiga ler a fonte de dados com sucesso.
      //O parâmetro dentro da função se refere ao nome da variável
      //que você vai dar para ler esse objeto.
      success: function (resposta) {
        //Agora basta definir os valores que você deseja preencher
        //automaticamente nos campos acima.
        $("#logradouro").val(resposta.logradouro);
        $("#complemento").val(resposta.complemento);
        $("#bairro").val(resposta.bairro);
        $("#cidade").val(resposta.localidade);
        $("#uf").val(resposta.uf);
        //Vamos incluir para que o Número seja focado automaticamente
        //melhorando a experiência do usuário
        $("#numero").focus();
      }
    });
  });
});


jQuery(document).ready(function () {
  jQuery('#ajax_form').submit(function () {
    var dados = jQuery(this).serialize();
    if ($("#condCheck").is(':checked')) {
      jQuery.ajax({
        type: "POST",
        url: "app/delivery/ins.php",
        data: dados,
        success: function (data) {
          if (!alert(data)) { window.location.reload(); }
        }
      });
    }
    else {
      var pathname = window.location.href;
      pathname = pathname.split("folder=");
      pathname = pathname[1].split("/&");
      pathname = pathname[0];
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        url: pathname + "/ins.php",
        data: dados,
        success: function (data) {
          if (pathname == "app/payment") {
            prepareNewDatabaseAction();
            prepareNotice(data);
            window.location.href = "main.php?folder=" + pathname + "/&file=frmins.php";
          } else {
            prepareNewDatabaseAction();
            prepareNotice(data);
            window.location.href = "main.php?folder=" + pathname + "/&file=library.php";
          }
        }
      });
    }
    return false;
  });

  jQuery('#ajax_form_upd').submit(function () {
    var pathname = window.location.href;
    pathname = pathname.split("folder=");
    pathname = pathname[1].split("/&");
    pathname = pathname[0];
    var dados = jQuery(this).serialize();
    jQuery.ajax({
      type: "POST",
      url: pathname + "/upd.php",
      data: dados,
      success: function (data) {
        prepareNewDatabaseAction();
        // if(!alert(data)){window.location.reload();}
        prepareNotice(data);
        window.location.href = "main.php?folder=" + pathname + "/&file=library.php";
      }
    });
    return false;
  });
});
//acaba ajax

function valDel(oque, qual, id) {//exclusão de usuário, categoria, etc.
  resp = confirm("Deseja excluir o(a) " + oque + ": " + qual + "? ");
  if (resp == true) {
    jQuery.ajax({
      type: "POST",
      url: "del.php",
      data: {
        id: id
      },
      success: function (data) {
        alert(data);
      }
    });
  }
}
function valDel(oque, qual) {
  resp = confirm("Deseja excluir o(a) " + oque + ": " + qual + "? ");
  alert(resp);
  if (oque == "usuário") {
    if (resp == 'true') {
    }
  }
}
function select_venda(id) {
  jQuery.ajax({
    type: "POST",
    url: "app/payment/find-buy-select.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#venda-dados").html(data);
    }
  });
}
function edit_product(id) {//alteração de usuário, etc.
  jQuery.ajax({
    type: "POST",
    url: "app/products/frmupd.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#area-product").html(data);
    }
  });
}
function edit_category(id) {//alteração de usuário, etc.
  jQuery.ajax({
    type: "POST",
    url: "app/categories/frmupd.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#area-category").html(data);
    }
  });
}
function focus_product(id) {//alteração de usuário, etc.
  jQuery.ajax({
    type: "POST",
    url: "app/products/focus.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#area-product").html(data);
    }
  });
}
function focus_user(id) {
  jQuery.ajax({
    type: "POST",
    url: "app/users/board.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#area-user").html(data);
    }
  });
}
function category_products(id, status) {
  $("#title-sec-catg").html("<h2>Produtos</h2>");
  jQuery.ajax({
    type: "POST",
    url: "app/categories/products.php",
    data: {
      id_category: id, status: status
    },
    success: function (data) {
      $("#area-category").html(data);
    }
  });
}
function providers_products(id, status) {
  $("#title-sec-prov").html("<h2>Produtos</h2>");
  jQuery.ajax({
    type: "POST",
    url: "app/providers/products.php",
    data: {
      id_fornecedor: id, status: status
    },
    success: function (data) {
      $("#area-provider").html(data);
    }
  });
}

function providers_edit(id) {//alteração de usuário, etc.
  $("#title-sec-prov").html("<h2>Alteração de fornecedor</h2>");
  jQuery.ajax({
    type: "POST",
    url: "app/providers/frmupd.php",
    data: {
      id: id
    },
    success: function (data) {
      $("#area-provider").html(data);
    }
  });
}
function valAlt(oque, qual, id) {//alteração de usuário, etc.
  resp = confirm("Deseja alterar o(a) " + oque + ": " + qual + "? ");
  if (oque == "usuário") {
    if (resp == true) {
      jQuery.ajax({
        type: "POST",
        url: "app/users/frmupd.php",
        data: {
          id: id
        },
        success: function (data) {
          $("#area-user").html(data);
        }
      });
    }
  }
}
function troca_produto(id, nome) {//alteração de usuário, etc.
  resp = confirm("Deseja registrar troca do produto: " + nome + "? \n Atenção! Ele ficará fora do estoque!");
  if (resp == true) {
    jQuery.ajax({
      type: "POST",
      url: "app/products/swap.php",
      data: {
        id: id
      },
      success: function (data) {
        // $("#area-provider").html(data);
        alert(data);
      }
    });
  }

}
function see_venda(id, idcliente) {//alteração de usuário, etc.
  $("#title-sec-venda").html("<h2>Informações da venda </h2>");
  jQuery.ajax({
    type: "POST",
    url: "app/customers/board.php",
    data: {
      id: idcliente
    },
    success: function (data) {
      $("#see-venda").html(data);
    }
  });
  jQuery.ajax({
    type: "POST",
    url: "app/sell/focus.php",
    data: {
      id: id
    },
    success: function (data) {
      var html = $("#see-venda").html();
      $("#see-venda").html(html + data);
    }
  });

}
function alterar_cliente(id, nome) {//alteração de usuário, etc.
  resp = confirm("Deseja alterar o cliente: " + nome + "?");
  if (resp == true) {
    $("#div-title-1").html("<h2>Alteração de cliente</h2>");
    jQuery.ajax({
      type: "POST",
      url: "app/customers/frmupd.php",
      data: {
        id: id
      },
      success: function (data) {
        $("#div-conteudo-cliente").html(data);
      }
    });
  }
}
function prepareNewDatabaseAction(){
  $("#BtnNewDatabaseAction").click();
}

function newDatabaseAction(params){
  jQuery.ajax({
    type: "POST",
    url: "app/action/ins.php",
    data: {
      type: params.type,
      name: params.name,
      table_afected: params.table_afected
    },
    success: function (data) {
      console.log("INSERT INTO actions ...ok");
    },
    error: function (){
      console.log("INSERT into actions ...error! Contate o administrador do sistema!");
    }
  });
}
