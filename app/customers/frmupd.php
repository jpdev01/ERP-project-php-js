<?php
  $id = $_GET['id'];
  include "../../security/database/connection.php";

  $sql ="SELECT * FROM clientes WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);//quero trocar o que tem no parâmetro id pelo que tem na variável $id
  $stm_sql-> execute();

  $cliente = $stm_sql->fetch(PDO::FETCH_ASSOC);
   ?>
   <!-- <script type="text/javascript" src="assets/js/dbfunctions.js"></script> -->
   <div class="row mypagina shadow-sm p-4">
   <form action="" method="post" id="ajax_form_upd">
     <input type="text" class="form-control" name="id" id="id" value="<?php echo $id;?>" hidden>
     <div class="form-row">
       <div class="form-group col-md-2">
         <label for="nome">Nome:</label>
         <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $cliente['nome'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="apelido">Apelido</label>
         <input type="text" class="form-control" name="apelido" id="apelido" value="<?php echo $cliente['apelido'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="rg">RG</label>
         <input type="number" class="form-control" name="rg" id="rg" value="<?php echo $cliente['rg'];?>">
       </div>
       <div class="form-group col-md-1,5">
         <label for="dataNascimento">Data de nascimento:</label>
         <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" value="<?php echo $cliente['dataNascimento'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="cpf">CPF:</label>
         <input type="number" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente['cpf'];?>">
       </div>
     </div>
     <div class="form-row">
       <div class="form-group col-md-1">
         <label for="tam">Tamanho:</label>
         <select id="tam" name="tam" class="form-control" value="<?php echo $cliente['tam'];?>">
         <option value=''>tamanho...</option>
         <?php
          $tamanhos = ['P', 'M', 'G', 'GG', 'XG'];
          foreach ($tamanhos as $tamanho) {
            if ($cliente['tam'] == $tamanho){
              ?>
            <option value="<?php echo $tamanho; ?>" selected><?php echo $tamanho; ?></option>
              <?php
            }else{
              ?>
              <option value="<?php echo $tamanho; ?>"><?php echo $tamanho; ?></option>
              <?php
            }
            
        }
         ?>
         </select>
       </div>
       <div class="form-group col-md-1">
         <label for="medida">Medida:</label>
         <select id="medida" name="medida" class="form-control">
           <option value=''>medida...</option>
           <?php
           for($i=30 ; $i < 60; $i+=2){
             if ($cliente['medida'] == $i){
              echo "<option value='$i' selected>$i</option>";
             }
             echo "<option value='$i'>$i</option>";
           }
           ?>
         </select>
       </div>
       <div class="form-group col-md-2">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente['email'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="fone">Telefone:</label>
         <input type="number" class="form-control" id="fone" name="fone" value="<?php echo $cliente['fone'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="celular">Celular:</label>
         <input type="number" class="form-control" id="celular" name="celular" value="<?php echo $cliente['celular'];?>">
       </div>
     </div>
     <?php
     $endereco = $cliente['end'];
     $endereco = unserialize($endereco);
      ?>
     <div class="form-row">
       <div class="form-group col-md-1">
         <label for="uf">Estado:</label>
         <select id="uf" name="uf" class="form-control" value="<?php echo $endereco['uf'];?>">
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
           <option value="SC">Santa Catarina</option>
           <option value="SP">São Paulo</option>
           <option value="SE">Sergipe</option>
           <option value="TO">Tocantins</option>
         </select>
       </div>
       <div class="form-group col-md-2">
         <label for="cidade">Município:</label>
         <input type="text" class="form-control" id="cidade" name="municipio" value="<?php echo $endereco['municipio'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="bairro">Bairro:</label>
         <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $endereco['bairro'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="logradouro">Logradouro:</label>
         <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo $endereco['logradouro'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="complemento">Complemento:</label>
         <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $endereco['complemento'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="cep">CEP:</label>
         <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $endereco['cep'];?>">
       </div>
     </div>
     <div class="form-row">
       <div class="form-group col-md-2">
         <label for="refer">Referência:</label>
         <input type="text" class="form-control" id="refer" name="refer" value="<?php echo $endereco['refer'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="filiacao">Filiação:</label>
         <input type="text" class="form-control" id="filiacao" name="filiacao" placeholder="pai e mãe..." value="<?php echo $cliente['filiacao'];?>">
       </div>
       <div class="form-group col-md-2">
         <label for="cargo">Cargo/Salário:</label>
         <input type="text" class="form-control" id="cargo" name="cargo" placeholder="renda.." value="<?php echo $cliente['cargo'];?>">
       </div>
     </div>
     <div class="form-row">
       <div class="form-group col-md-2">
         <label for="dataRegistro">Data de Registro:</label>
         <input type="text" class="form-control" id="dataRegistro" name="dataRegistro" value="<?php echo $cliente['dataRegistro'];?>">
       </div>
       <div class="form-group col-md-4">
         <label for="dsc">Observação:</label>
         <input type="text" class="form-control" id="dsc" name="dsc" value="<?php echo $cliente['dsc'];?>">
       </div>
     </div>
     <button type="reset" class="btn btn-danger">Apagar</button>
     <button type="submit" class="btn btn-success">Salvar</button>
   </form>
</div>
