<?php

$usuariotxt          = $_POST['usuariotxt'];
$senhatxt            = $_POST['senhatxt'];

$msg = "erro de programação";


include "../database/connection.php"; //a função include importa um outro arquivo PHP

$sql = "SELECT * FROM usuarios WHERE usuario=:usuariotxt AND senha=:senhatxt";

$stm_sql = $db_connection-> prepare($sql);
$stm_sql -> bindParam(':usuariotxt', $usuariotxt);
$stm_sql -> bindParam(':senhatxt', $senhatxt);
$stm_sql -> execute();
//excluir isso dps
if (($usuariotxt=="admin") && ($senhatxt=="adminadmin")){
  session_start();
  $_SESSION['usuario'] = $usuariotxt;
  $_SESSION['senha'] = $senhatxt;
  $_SESSION['idsessao'] = session_id();
  $msg= "entrar";
}//excluir isso dps
else if ($stm_sql->rowCount()==0){

  $msg="entrada não permitida";
}
else{
  $user = $stm_sql->fetch(PDO::FETCH_ASSOC);
  session_start();
  $_SESSION['idUser'] = $user['id'];
  $_SESSION['usuario'] = $usuariotxt;
  $_SESSION['senha'] = $senhatxt;

  if ($user['permissao']==0){
    $_SESSION['permission'] = "pattern";
  }else{
    $_SESSION['permission'] = "adm";
  }

  $_SESSION['idsessao'] = session_id();
  $msg= "entrar";
}
echo $msg;
?>
