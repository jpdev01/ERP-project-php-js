<div class="row container mt-3 h-100 d-inline-block mypagina shadow-sm">
  <div class="col-12">
    <div class="row">
      <div class="col-8">
        <h2>Compras</h2>
      </div>
      <div class="col-4">
        <h2>Registrar pagamento</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="input-group flex-nowrap">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping"><img src='assets/css/bootstrap-icons-1.0.0/person-fill.svg' width='100%' height='100%' >Cliente</span>
          </div>
          <input autocomplete="off" type="search" class="form-control" list="list_clientes" name="cliente" id="cliente" placeholder="Cliente..." aria-describedby="addon-wrapping">
          <datalist name="list_clientes" id="list_clientes">
            <?php
            include "security/database/connection.php";
            $sql = "SELECT * from clientes";

            $stm_sql = $db_connection->prepare($sql);
            $stm_sql -> execute();

            $clientes = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($clientes as $cliente){//para cada linha, crie uma variavel catg
              $nome = $cliente['nome'];
              $listclientes=$listclientes.chr(34).$nome.Chr(34).",";
              ?>
              <option value="<?php echo $nome; ?>"></option>
              <?php
            }
            $listclientes = substr($listclientes,0,-1);
            $listclientes=("var clientes = [".$listclientes."],\nregex = new RegExp('\\\\b' + clientes.join(".Chr(34)."\\\\b|\\\\b".Chr(34).") + '\\\\b', 'i');");
            // setcookie('listclientes', $listclientes);
            ?>
          </datalist>
        </div>

        <table class='table table-striped table-sm'>
          <thead class='thead-dark'>
            <tr>
              <th scope="col">Data</th>
              <th scope="col">Valor total</th>
              <th scope="col">Parcelas</th>
              <th scope="col">Desconto</th>
              <th scope="col">Valor pago</th>
              <th scope="col"><div class="custom-control custom-checkbox custom-select-sm">
                <input type="checkbox" class="custom-control-input bd-danger" id="check-sell-pendente">
                <label class="custom-control-label" for="check-sell-pendente">Pendente</label>
              </div></th>
            </tr>
          </thead>
          <tbody id='pend-customer-table'>
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <div id='venda-dados'></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/dbfunctions.js"></script>
<script language="javascript">//java script que valida a entrada do input cliente
<?php echo $listclientes; ?>
$(function () {
  $("#cliente").on("change", function () {
    var valid = regex.test(this.value);
    if (valid==false){
      alert ("Cliente não encontrado!");
      jQuery( this ).val("");
      jQuery( this ).focus();
    }else{
      var dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: "POST",
        url: "app/payment/find-buy.php",
        data: dados,
        success: function( data ){
          $("#pend-customer-table").html(data);
        }
      });

      return false;
    }
  });

});
// function vazio() {//sem uso
//   var x;
//   x = document.getElementById("cliente").value;
//   if ((x == "")||(x == null)) {
//     alert("Selecione uma opção");
//     return false;
//   };
// }
</script>
