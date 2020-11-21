function openModal(diretory, content, filtro, options){
  jQuery.ajax({
    type: "POST",
    url: diretory,
    data: content,
    // success: function( data ){
    // },
    error: function( ){
      console.log("Erro na query");
      var data = ["nenhum resultado encontrado"];
    }
  }).always(function(html) {
    const req = new Promise((resolve, reject) => {
      jQuery.ajax({
        type: "POST",
        url: "app/modal.php",
        data: {
          content: content,
          html: html,
          options: options,
          filtro: filtro
        }
      }).then(function(htmlModal){
        const content = new Promise((resolve, reject) => {
          $("#htmlModal").html(htmlModal);
          resolve();
        })
        content.then(res => {
          document.getElementById("btnModal").click();
        })
      });
    });
  });

}
