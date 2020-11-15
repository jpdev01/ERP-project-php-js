<?php
include '../../security/database/connection.php';
$key='';
$msg = "";
$total=0;
$funcao = !empty($_POST['funcao']) ? $_POST['funcao'] : null;
$code = isset($_POST['scannercode']) ? $_POST['scannercode'] : null;
$codes            = (isset($_COOKIE['codes'])) ? $_COOKIE['codes']: array();
$qtdes=array();
$fn_rest = (isset($_COOKIE['explodesell'])) ? $_COOKIE['explodesell']: 'none';
if ($fn_rest == 'yes'){
  $codes=unserialize($codes);
  setcookie('sell', 0, null, '/');
  unset($fn_rest);
  $arr=array();
  $arr=serialize($arr);
  setcookie('codes', $arr, null, '/');
  setcookie('qtdes', $arr, null, '/');
  $codes=unserialize($arr);
  $code='';
  setcookie('explodesell', 'none', null, '/');
}



$qtde_disponivel=0;
$qtde_selecionada=0;
if ($funcao==null){
  if ($code!=null && $code!=''){
    $sql = "SELECT * FROM produtos WHERE code=:code and status=0";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':code', $code);
    $stm_sql -> execute();
    $product = $stm_sql->fetch(PDO::FETCH_ASSOC);             //verifica se existe produto com o código informado pelo user
    if ($stm_sql->rowCount()!=0){
      if(empty($codes)){                     // valida se o array codes está vazio, se estiver ele adiciona na primeira posição
        $codes = array($code);
      }else{                             // se nao estiver ele adiciona na ultima posição
        $codes=unserialize($codes);
        array_push($codes, $code);                 //adiciona o código no array codes
      }
      $codes = serialize($codes);   // torna o array uma string
      setcookie('codes', $codes, null, '/');  // coloca a string no cookies
      $codes = unserialize($codes);    //torna a string um array novamente
    }
  }
  if(!is_array($codes) && (!empty($codes))  ){   //se a variavel nao for um array, significa que ela esta sobre a funcao serialize, logo precisa dar unserialize
    $codes = unserialize($codes);
  }
}else if($funcao=="exclude"){
  if(!is_array($codes) && (!empty($codes))){   //se a variavel nao for um array, significa que ela esta sobre a funcao serialize, logo precisa dar unserialize
    $codes = unserialize($codes);
  }
  $key = array_search($code, $codes);
  // if($key!==false){
  unset($codes[$key]);
  // }
  // $codes = array_values( $codes );
  // $codes = array_diff($codes, [$code]);
  $codes = serialize($codes);
  setcookie('codes', $codes, null, '/');
  $codes = unserialize($codes);
  $qtdes[$code] = isset($qtdes[$code])?$qtdes[$code]-1:-1;
}

// $qtdes=array();

if (!empty($codes)){
  foreach($codes as $codeprod){
    $qtdes[$codeprod] = isset($qtdes[$codeprod]) ? $qtdes[$codeprod] + 1: 1;
    $sql = "SELECT * from produtos WHERE code=:pcode";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql-> bindParam(':pcode', $codeprod);
    $stm_sql -> execute();
    $product = $stm_sql->fetch(PDO::FETCH_ASSOC);  //processo de concatenar a tabela
    $qtde_disponivel = $product['qtde'];
    $qtde_selecionada = isset($qtdes[$codeprod])?$qtdes[$codeprod]:0;
    if ($qtde_disponivel - $qtde_selecionada>=0){
      // set_prodoct($codeprod, 1, 0);
      $msg .="                <tr>";
      $msg .="                    <td>".$product['code']."</td>";
      $msg .="                    <td>".$product['nome']."</td>";
      $msg .="                    <td>".$product['categorias_id']."</td>";
      $msg .="                    <td> R$".$product['vlrVenda']."</td>";
      $msg .="                    <td><img src='assets/css/bootstrap-icons-1.0.0/trash.svg' alt='' width='' height='' title='excluir' onclick='remove_prod_sell(".$product['code'].");'></td>";
      $msg .="                </tr>";
      $total += $product['vlrVenda'];
    }else{
      $key = array_search($codeprod, $codes);
      unset($codes[$key]);
      $codes = serialize($codes);
      setcookie('codes', $codes, null, '/');
      // $codes = array_diff($codes, [$codeprod]);
      $qtdes[$codeprod]--;
    }
  }
}


// function set_prodoct($code, $status, $qtde){
//   include '../../security/database/connection.php';
//   $sql = "UPDATE produtos SET qtde=:qtde, status=:status WHERE code=:pcode"; //atualiza os dados dos produtos comprados
//   $stm_sql = $db_connection->prepare($sql);
//   $stm_sql-> bindParam(':pcode', $code);
//   $stm_sql-> bindParam(':qtde', $qtde);
//   $stm_sql-> bindParam(':status', $status);
//
//   $result = $stm_sql->execute();
// }



$qtdes=serialize($qtdes);
setcookie('qtdes', $qtdes, null, '/');
setcookie('sell', $total, null, '/');

//retorna a msg concatenada
$qtdes=unserialize($qtdes);
echo $msg;
?>
<!-- <script type="text/javascript" src="assets/js/sell.js"></script> -->
