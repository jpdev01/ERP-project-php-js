<div class="col-6" id="input-products-new-sell">

    <form action="" method="post" id="ajax_form_scan" class="">
        <div class="input-group mb-3 input-group-sm">
            <input type="text" name="scannercode" id="code" class="form-control" placeholder="Código de barras do produto...">
            <div class="input-group-prepend">
                <div class="input-group-text bg-light">
                    <input type="radio" class='box-mode mr-2' id="box-scannercode" value="0" name="mode_code" checked>
                    <img src="assets/css/bootstrap-icons-1.0.0/upc-scan.svg" alt="" width="18" height="18" title="usar leitor">
                </div>
                <div class="input-group-text bg-light">
                    <input type="radio" value="1" class='box-mode mr-2' name="mode_code">
                    <img src="assets/css/bootstrap-icons-1.0.0/keyboard.svg" alt="" width="18" height="18" title="usar teclado">
                </div>
            </div>
        </div>
    </form>
    <div class="my-custom-scrollbar my-custom-scrollbar-primary container p-2">
        <div class="table-responsive table-sm">
            <table class='table'>
                <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Código de Barras</th>
                        <th scope='col'>Produto</th>
                        <th scope='col'>Categoria</th>
                        <th scope='col'>Preço</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="products">
                </tbody>
            </table>
        </div>
    </div>
    <h5 id="vartotal"></h5>
</div>