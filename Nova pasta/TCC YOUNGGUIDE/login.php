<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@800&family=Questrial&display=swap');
    </style>
    <link href="css/userstyle.css" rel="stylesheet">
    <title>Login</title>
    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
</head>
<body>
    <div class="fundo">
        <div class="container">
            <div class="login">
                    <div class="m_tit"><h1><b>Login</b></h1><br></div>
                <form method="post">
                    <input class="um" placeholder="    Usuário" type="text" name="email1"> <br>
                    <input class="um" placeholder="    Senha" type="password" name="senha1"> <br>
                    <input id="entrar" type="submit" value="Logar">
                </form>
                <div class="m_t"><p>Ou...</p></div>
                <button id="cadm"><a href="cadastro.php">Cadastre-se!</a></button>
                <div class="encaminha"><a href="eslogin.php">Especialista</a><br/>
                     <a href="admlogin.php">Administrador</a></div>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
session_start();
include('conexao.php');
include('login.html');

if (empty($_POST['email1']) || empty($_POST['senha1'])) {
    header('login.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['email1']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha1']);

$query ="SELECT id, usuario from usuario where usuario ='{$usuario}' and senha = md5('{$senha}') and conta ='v'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
   $_SESSION ['email1'] = $usuario;
   header('location:home.php');
   exit();
}

else {
    $_SESSION['nao_autenticado'] = true;
header('location:login.php');
echo "login ou senha incorreto";
exit();
}
?>
