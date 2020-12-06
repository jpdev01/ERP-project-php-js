<?php
$inputGroupSize = "input-group-sm";
?>
<div class="container mypagina shadow-sm p-4 mb-2">
  <!-- <h3>Cadastro de cliente</h3> -->
  <form action="" method="post" id="<?php echo $form_title; ?>">
    <input value="" id="id" name="id" hidden>
    <div class="form-row">
      <p class="border-bottom d-block w-100 text-black-50">Identidade</p>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" id="nome" required>
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="apelido">Apelido</label>
        <input type="text" class="form-control" name="apelido" id="apelido">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="rg">RG</label>
        <input type="number" class="form-control" name="rg" id="rg">
      </div>
      <div class="form-group col-md <?php echo $inputGroupSize; ?>">
        <label for="dataNascimento">Data de nascimento:</label>
        <input type="date" class="form-control" name="dataNascimento" id="dataNascimento">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="cpf">CPF:</label>
        <input type="number" class="form-control" id="cpf" name="cpf">
      </div>
    </div>
    <div class="form-row">
      <div class='col-md-4'>
        <p class="border-bottom d-block w-100 text-black-50">Manequim</p>
        <div class="row">
          <div class="form-group col-md <?php echo $inputGroupSize; ?>">
            <label for="tam">Tamanho:</label>
            <select id="tam" name="tam" class="form-control">
              <option value=''>tamanho...</option>
              <option value="P">P</option>
              <option value="P">M</option>
              <option value="P">G</option>
            </select>
          </div>
          <div class="form-group col-md <?php echo $inputGroupSize; ?>">
            <label for="medida">Medida:</label>
            <select id="medida" name="medida" class="form-control">
              <option value=''>medida...</option>
              <?php
              for ($i = 30; $i < 60; $i += 2) {
                echo "<option value='$i'>$i</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <p class="border-bottom d-block w-100 text-black-50">Contato</p>
        <div class="row">
          <div class="form-group col-md-4 <?php echo $inputGroupSize; ?>">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group col-md <?php echo $inputGroupSize; ?>">
            <label for="fone">Telefone:</label>
            <input type="number" class="form-control" id="fone" name="fone">
          </div>
          <div class="form-group col-md <?php echo $inputGroupSize; ?>">
            <label for="celular">Celular:</label>
            <input type="number" class="form-control" id="celular" name="celular">
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <p class="border-bottom d-block w-100 text-black-50">Endereço</p>
      <div class="form-group col-md-1 <?php echo $inputGroupSize; ?>">
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
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="cidade">Município:</label>
        <input type="text" class="form-control" id="cidade" name="cidade" value="Joinville">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="bairro">Bairro:</label>
        <input type="text" class="form-control" id="bairro" name="bairro" value="">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="logradouro">Logradouro:</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" value="">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="complemento">Complemento:</label>
        <input type="text" class="form-control" id="complemento" name="complemento" value="">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="cep">CEP:</label>
        <input type="text" class="form-control" id="cep" name="cep" value="">
      </div>
    </div>

    <div class="form-row">
      <p class="border-bottom d-block w-100 text-black-50" onclick="addFamily();">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
        Adicionar família
      </p>

      <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="conjugue">Conjugue:</label>
          <input type="text" class="form-control" id="conjugue">
        </div>
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="FamilyFather">Pai:</label>
          <input type="text" class="form-control" id="FamilyFather">
        </div>
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="FamilyMother">Mãe:</label>
          <input type="text" class="form-control" id="FamilyMother">
        </div>
            </div>
            <div class="form-row">
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="FamilyGrant">Avós:</label>
          <input type="text" class="form-control" id="FamilyGrant">
        </div>
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="FamilySister">Irmão ou irmã:</label>
          <input type="text" class="form-control" id="FamilySister">
        </div>
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="FamilySon">Filho/Filha:</label>
          <input type="text" class="form-control" id="FamilySon">
        </div>
        <div class="inputGroupFamily form-group col-md <?php echo $inputGroupSize; ?>">
          <label for="outhersFamily">Outros graus de parentesco:</label>
          <input type="text" class="form-control" id="FamilyOuthers">
        </div>
    </div>

    <div class="form-row">
      <p class="border-bottom d-block w-100 text-black-50">Adicionais</p>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="refer">Referência:</label>
        <input type="text" class="form-control" id="referencia" name="refer">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="filiacao">Filiação:</label>
        <input type="text" class="form-control" id="filiacao" name="filiacao" placeholder="pai e mãe...">
      </div>
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="cargo">Cargo/Salário:</label>
        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="renda..">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2 <?php echo $inputGroupSize; ?>">
        <label for="dataRegistro">Data de Registro:</label>
        <input type="text" class="form-control" id="dataRegistro" name="dataRegistro" value="<?php echo date('Y-m-d'); ?>">
      </div>
      <div class="form-group col-md-7 <?php echo $inputGroupSize; ?>">
        <label for="dsc">Observação:</label>
        <textarea class="form-control" id="dsc" name="dsc" rows="4" style="resize: none;"></textarea>
      </div>
    </div>
    <button type="reset" class="btn btn-danger">Apagar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
  </form>
</div>