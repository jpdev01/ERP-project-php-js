jQuery(document).ready(function(){
  jQuery('#ajax_form').submit(function(){

    usuario = document.frmlogin.usuariotxt.value;
    password = document.frmlogin.senhatxt.value;
    if (usuario==""){
      alert("Preencha o campo Usuário!");
      // return false;
    }
    else if (password==""){
      alert("Preencha o campo Senha!");
      // return false;
    }
    else{
      var dados = jQuery( this ).serialize();

      jQuery.ajax({
        type: "POST",
        url: "security/authentication/login.php",
        data: dados,
        success: function( data ){
          if(data=="entrar"){
            location.href='main.php';
          }
          else{
            alert("Usuário ou senha Incorretos");
          }
        }
      });

      return false;
    }
  });
});
