<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@800&family=Questrial&display=swap');
    </style>
    <script src="https://kit.fontawesome.com/65f22fe718.js" crossorigin="anonymous"></script>
    <link href="css/userstyle.css" rel="stylesheet">
    <title>Login</title>
    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
</head>
<body>
    <script src="https://kit.fontawesome.com/65f22fe718.js" crossorigin="anonymous"></script>
    <div class="fundo">
        <div class="container">
            <div class="login">
                    <div class="m_tit"><h1><b>Especialista</b></h1><i class="fa-solid fa-palette" style="color: #8c52ff;"></i><br></div>
                <form method="post">
                    <input class="um" placeholder="    Usuário" type="text" name="email3"> <br>
                    <input class="um" placeholder="    Senha" type="password" name="senha3"> <br>
                    <input id="entrar" type="submit" value="Logar">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
session_start();
include('conexao.php');
include('eslogin.html');

if (empty($_POST['email3']) || empty($_POST['senha3'])) {
    header('login.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['email3']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha3']);

$query ="SELECT id, usuario from especialista where usuario ='{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
   $_SESSION ['email3'] = $usuario;
   header('location:eshome.php');
   exit();
}

else {
    $_SESSION['nao_autenticado'] = true;
header('location:eslogin.php');
exit();
}
?>