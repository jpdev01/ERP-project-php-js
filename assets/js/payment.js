function show_vouchers(pag, saldo){
  alert(saldo);
        jQuery.ajax({
          type: "POST",
          url: "app/payment/vouchers.php",
          data: {saldo: saldo, pag: pag},
          success: function (data) {
            $("#voucher").html(data);
          }
        });
        return false;
}