<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Neusa Moda/login</title>
<link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
  </head>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="security/authentication/auth.js"></script>


<body>
    <div class="loginbox">
    <img src="assets/images/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form name="frmlogin" method="post" id="ajax_form">
            <p>Username</p>
            <input type="text" name="usuariotxt" id="usuariotxt" placeholder="Enter Username">
            <p>Senha</p>
            <input type="password" name="senhatxt" id="senhatxt" placeholder="Enter Password">
            <input type="submit" name="" value="Login" onclick="fnvalidacao_login()">
            <div class="msg-error" style="display:none;" id="error">
              <p>Usuario ou senha incorretos</p>
            </div>
            <!-- <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a> -->
        </form>

    </div>
</body>
</html>
