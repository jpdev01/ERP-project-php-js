
<div class="container mypagina shadow-sm p-4">
  <h3>Cadastro de cliente</h3>
  <form action="" method="post" id="ajax_form">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" required>
      </div>
      <div class="form-group col-md-2">
        <label for="apelido">Apelido</label>
        <input type="text" class="form-control" name="apelido" id="apelido">
      </div>
      <div class="form-group col-md-2">
        <label for="rg">RG</label>
        <input type="number" class="form-control" name="rg" id="rg">
      </div>
      <div class="form-group col-md-1,5">
        <label for="dataNascimento">Data de nascimento:</label>
        <input type="date" class="form-control" name="dataNascimento" id="dataNascimento">
      </div>
      <div class="form-group col-md-2">
        <label for="cpf">CPF:</label>
        <input type="number" class="form-control" id="cpf" name="cpf">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="tam">Tamanho:</label>
        <select id="tam" name="tam" class="form-control">
          <option value=''>tamanho...</option>
          <option value="P">P</option>
          <option value="P">M</option>
          <option value="P">G</option>
        </select>
      </div>
      <div class="form-group col-md-1">
        <label for="medida">Medida:</label>
        <select id="medida" name="medida" class="form-control">
          <option value=''>medida...</option>
          <?php
          for($i=30 ; $i < 60; $i+=2){
            echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group col-md-2">
        <label for="fone">Telefone:</label>
        <input type="number" class="form-control" id="fone" name="fone">
      </div>
      <div class="form-group col-md-2">
        <label for="celular">Celular:</label>
        <input type="number" class="form-control" id="celular" name="celular">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="uf">Estado:</label>
        <select id="uf" name="uf" class="form-control">
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC" selected>Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="cidade">Município:</label>
        <input type="text" class="form-control" id="cidade" name="municipio" value="Joinville">
      </div>
      <div class="form-group col-md-2">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" value="">
      </div>
      <div class="form-group col-md-2">
        <label for="logradouro">Logradouro:</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" value="">
      </div>
      <div class="form-group col-md-2">
        <label for="complemento">Complemento:</label>
        <input type="text" class="form-control" id="complemento" name="complemento" value="">
      </div>
      <div class="form-group col-md-2">
        <label for="cep">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cep" value="">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="refer">Referência:</label>
        <input type="text" class="form-control" id="refer" name="refer">
      </div>
      <div class="form-group col-md-2">
        <label for="filiacao">Filiação:</label>
        <input type="text" class="form-control" id="filiacao" name="filiacao" placeholder="pai e mãe...">
      </div>
      <div class="form-group col-md-2">
        <label for="cargo">Cargo/Salário:</label>
        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="renda..">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
        <label for="dataRegistro">Data de Registro:</label>
        <input type="text" class="form-control" id="dataRegistro" name="dataRegistro" value="<?php echo date('Y-m-d');?>">
      </div>
      <div class="form-group col-md-4">
        <label for="dsc">Observação:</label>
        <input type="text" class="form-control" id="dsc" name="dsc">
      </div>
    </div>
    <button type="reset" class="btn btn-danger">Apagar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
  </form>
</div>
