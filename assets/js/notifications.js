$(document).ready(function () {
  $("#areaToaster").hide();
    var notice = Cookies.get("notification");
    if (notice != "null") {
        newNotification();
    }
});

function newNotification() {
  $("#areaToaster").show();
    $(".toast").toast('show');
  }
  
  function prepareNotice(aviso) {
    //msg = {
    //  head: "Notificação",
    //  body: msg
    //};
    msg = ["Notificação", aviso];
  
    //não esta funcionando
    var data = new Date();
    data.setSeconds(data.getSeconds() + 3);
    Cookies.set('notification', msg, data, '/');
  }