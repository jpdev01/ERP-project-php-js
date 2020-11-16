function find(diretory, id, filtro, options){
  category = id;
  provider="";
  jQuery.ajax({
    type: "POST",
    url: diretory,
    data:{
      id: id,
      category: category,
      filtro: filtro,
    },
    // success: function( data ){
    // },
    error: function( ){
      var data = ["nenhum resultado encontrado"];
    }
  }).always(function(data) {

  });

}

function openModal(data, filtro, id, options){
  const req = new Promise((resolve, reject) => {
    jQuery.ajax({
      type: "POST",
      url: "app/modal.php",
      data:{
        id: id,
        data: data,
        options: options,
        filtro: filtro
      }
    }).then(function(htmlModal){
      alert("inserindo");
    });
  });
}

function insert(html){
  alert("insert");
  const content = new Promise((resolve, reject) => {
    $("#htmlModal").html(htmlModal);
    alert("criou a promise");
    resolve();
  })
  content.then(res => {
    alert("content resolvido");
    document.getElementById("btnModal").click();
  })
}
