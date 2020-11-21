<?php


session_start();

if(!isset($_SESSION['idsessao'])||($_SESSION['idsessao']!= session_id())){
  lockPermission("index.php");
}else{
  $arr_adm = ["reports", "users"];

  include "security/database/connection.php";
  $sql = "SELECT * from usuarios WHERE id=:id";
  $stm_sql = $db_connection->prepare($sql);
  $stm_sql -> bindParam(':id', $_SESSION['idUser']);
  $stm_sql -> execute();
  $user = $stm_sql->fetch(PDO::FETCH_ASSOC);

  //$pag = $_SERVER['PHP_SELF'];
  $pag = $_SERVER["REQUEST_URI"];

  if ($user['permissao']==0){
    foreach ($arr_adm as $pagAdm) {
      if (strpos($pag, $pagAdm) == true){
        lockPermission("accessDenied.html");
      }
    }
  }

}

function lockPermission($destiny){
  $pag = $_SERVER['PHP_SELF'];
  if ((strpos($pag,"main") == true)|| ($pag=="")){
    //veio da main
    if($destiny=="index.php"){
      header("Location: index.php");
    }else if($destiny=="accessDenied.html"){
      header("Location: accessDenied.html");
    }

  }else{
    if($destiny=="index.php"){
      header("Location: ../../ index.php");
    }else if($destiny=="accessDenied.html"){
      header("Location: ../../ accessDenied.html");
    }

  }
  exit;
}

?>
