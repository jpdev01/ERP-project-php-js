<?php
include '../../security/database/connection.php';
$pagina   = ($_POST['pagina']!="")?$_POST['pagina']:null;
$temp = ($_POST['periodo']!="")?$_POST['periodo']:null;


date_default_timezone_set('America/Sao_Paulo');
// Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
$data = Date('Y-m-d', time());
if ($pagina=="vendas"){

  if ($temp==1){
    $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
    $diasemana[-1]="Sábado";
    $diasemana[-2]="Sexta";
    $diasemana[-3]="Quinta";
    $diasemana[-4]="Quarta";
    $diasemana[-5]="Terça";
    $diasemana[-6]="Segunda";
    $diasemana[-7]="Domingo";
    // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
    // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
    $diasemana_numero = date('w', strtotime($data));
    for ($i=7; $i>0 ; $i--) {
      $periodo[] = $diasemana[$diasemana_numero-$i];
    }
    $qtde_vendas=array();
    $vendas_info=array();
    // var_dump($semana);
    //dias do mes ------------------------------------------------------------------------------
    $mes = date('m');
    $ano = date('Y');
    for ($i=7; $i>0 ; $i--) {
      $dia = date('d') - $i;
      $data = mktime(0,0,0,$mes,$dia,$ano);
      $data=date('Y-m-d',$data);
      $datas[]=$data;
      $data1 = $data. " 00:00:00 ";
      $data2 = $data. " 23:59:00";

      $sql = "SELECT * FROM vendas WHERE data BETWEEN :data1 AND :data2";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql-> bindParam(':data1', $data1);
      $stm_sql-> bindParam(':data2', $data2);
      $stm_sql -> execute();
      $qtde_vendas[] = $stm_sql->rowCount();
      $vendas = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      $vendas_info[] = $vendas;
    }
  }
  else if($temp==2){
    $datas=array();
    $periodo = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
    for ($i=0; $i<=11 ; $i++) {
      $mes=$i+1;
      $sql = "SELECT * FROM vendas WHERE MONTH(data)=:mes";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql-> bindParam(':mes', $mes);
      $stm_sql -> execute();
      $qtde_vendas[] = $stm_sql->rowCount();


    }
  }
  else if($temp==3){
    $datas=array();
    $periodo=array();
    $year = date('yy', strtotime($data));
    for ($i=10; $i >=0 ; $i--) {
      $periodo[]=$year-$i;
    }
    for ($i=10; $i >=0 ; $i--) {
      $year=$periodo[$i];
      $sql = "SELECT * FROM vendas WHERE YEAR(data)=:year";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql-> bindParam(':year', $year);
      $stm_sql -> execute();
      $qtde_vendas[] = $stm_sql->rowCount();
    }
    $qtde_vendas = array_reverse($qtde_vendas, false);
  }




  //concatenar tudo ---------------------------------------------------------------------


  // $valores = array(
  //   $semana, $datas, $qtde_vendas
  // );
  $valores= array(
    'periodo'  => $periodo,
    'datas' => $datas,
    "qtde_vendas" => $qtde_vendas

    // "vendas_info" => $vendas_info
  );
  print json_encode($valores);
}


else if($pagina=="categorias"){
  $sql = "SELECT id, nome FROM categorias ORDER BY nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categories as $category) {
    $categoryname=$category['nome'];
    $categoryid=$category['id'];
    $namecategories[]=$categoryname;
    $idcategories[]=$categoryid;
  }

  $codes=array();
  $sql = "SELECT produtos FROM vendas";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $vendas_produtos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($vendas_produtos as $venda_produtos) {
    $venda_produtos=$venda_produtos['produtos'];
    $venda_produtos=unserialize($venda_produtos);
    foreach ($venda_produtos as $venda_produto) {
      $codes[]=$venda_produto;
    }
  }

  $categories=array();
  foreach ($codes as $code) {
    $sql = "SELECT p.nome, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id WHERE p.code=:code ORDER BY c.nome ASC ";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':code', $code);
    $stm_sql -> execute();
    $produto = $stm_sql->fetch(PDO::FETCH_ASSOC);
    $categories[]=$produto['nomecategoria'];
  }
  // foreach ($categories as $category) {
  // array_count_values($categories);
  // }
  $valores= array(
    'nomecategorias' => $namecategories,
    'p_categorias' => $categories
  );
  //
  //
  //
  //   print json_encode($valores);
  print json_encode($valores);

}

else if($pagina=="fornecedores"){
  $sql = "SELECT id, nome FROM fornecedores ORDER BY nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $fornecedores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($fornecedores as $fornecedor) {
    $fornecedorname=$fornecedor['nome'];
    $fornecedorid=$fornecedor['id'];
    $namefornecedores[]=$fornecedorname;
    $idfornecedores[]=$fornecedorid;
  }

  $codes=array();
  $sql = "SELECT produtos FROM vendas";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $vendas_produtos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($vendas_produtos as $venda_produtos) {
    $venda_produtos=$venda_produtos['produtos'];
    $venda_produtos=unserialize($venda_produtos);
    foreach ($venda_produtos as $venda_produto) {
      $codes[]=$venda_produto;
    }
  }

  $categories=array();
  foreach ($codes as $code) {
    $sql = "SELECT p.nome, f.nome AS nomefornecedor FROM produtos p INNER JOIN fornecedores f ON p.fornecedores_id = f.id WHERE p.code=:code ORDER BY f.nome ASC ";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':code', $code);
    $stm_sql -> execute();
    $produto = $stm_sql->fetch(PDO::FETCH_ASSOC);
    $fornecedores[]=$produto['nomefornecedor'];
  }
  // foreach ($categories as $category) {
  // array_count_values($categories);
  // }
  $valores= array(
    'nomefornecedores' => $namefornecedores,
    'p_fornecedores' => $fornecedores
  );
  //
  //
  //
  //   print json_encode($valores);
  print json_encode($valores);

}

else if($pagina=="frmpgto"){

  $codes=array();
  $sql = "SELECT frmPgto FROM vendas";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $vendas_frmpgto = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

  foreach ($vendas_frmpgto as $venda_frmpgto) {
    $frmpgtos[]=$venda_frmpgto['frmPgto'];
  }


  //
  //
  //
  //   print json_encode($valores);
  print json_encode($frmpgtos);

}else if($pagina=="produtos por categorias"){
  $sql = "SELECT id, nome FROM categorias ORDER BY nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categories as $category) {
    $categoryname=$category['nome'];
    $categoryid=$category['id'];
    $namecategories[]=$categoryname;
    $idcategories[]=$categoryid;
  }

  $codes=array();
  $sql = "SELECT p.id, p.qtde, c.nome AS nomecategoria FROM produtos p INNER JOIN categorias c ON p.categorias_id = c.id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $produtos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($produtos as $produto){
    $p_categories[]= $produto['nomecategoria'];
  }
  $sql = "SELECT nome FROM categorias";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $categorias = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categorias as $categoria) {
    $categoria = $categoria['nome'];
    $arr_categories[]=$categoria;
  }


  $valores= array(
    'nomecategorias' => $arr_categories,
    'p_categorias' => $p_categories
  );
  //
  //
  //
  //   print json_encode($valores);
  print json_encode($valores);

}else if($pagina=="produtos por fornecedores"){
  // $sql = "SELECT id, nome FROM fornecedores ORDER BY nome ASC";
  // $stm_sql = $db_connection->prepare($sql);
  // $stm_sql -> execute();
  // $fornecedores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  // foreach ($fornecedores as $fornecedor) {
  //   $fornecedorname=$fornecedor['nome'];
  //   $fornecedorid=$fornecedor['id'];
  //   $namefornecedores[]=$categoryname;
  //   $idfornecedores[]=$categoryid;
  // }

  $codes=array();
  $sql = "SELECT p.id, p.qtde, f.nome AS nomefornecedor FROM produtos p INNER JOIN fornecedores f ON p.fornecedores_id = f.id ORDER BY f.nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $produtos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($produtos as $produto) {
    $p_fornecedores[]= $produto['nomefornecedor'];
  }
  $sql = "SELECT nome FROM fornecedores ORDER BY nome ASC";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> execute();
  $fornecedores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
  foreach ($fornecedores as $fornec) {
    $fornec = $fornec['nome'];
    $arr_fornecedores[]=$fornec;
  }


  $valores= array(
    'nomefornecedores' => $arr_fornecedores,
    'p_fornecedores' => $p_fornecedores
  );
  //
  //
  //
  //   print json_encode($valores);
  print json_encode($valores);

}
?>
