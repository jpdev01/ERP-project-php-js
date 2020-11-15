

$("#btnExport").click(function (e) {
    window.open('data:application/vnd.ms-excel,' + $('#tblTeste').html());
    e.preventDefault();
});
