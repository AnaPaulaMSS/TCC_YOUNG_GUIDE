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
    <title>Young Guide!</title>
</head>
<body>
    <div class="fundo">
        <div class="container">
            <div class="login" style="padding:30px;">
                    <div class="m_tit"><h1><b>Administrador</b></h1><br></div>
                <form method="post">
                    <input class="um" placeholder="    Usuário" type="text" name="email2"> <br>
                    <input class="um" placeholder="    Senha" type="password" name="senha2"> <br>
                    <input id="entrar" type="submit" value="Logar">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
session_start();

 //os includes puxam os dados dos arquivos no conexao puxam os dados do banco de dados 
include('conexao.php');
//na linha 35 a 38 esta sendo feita uma verificação se o usuario e senha digitados estão corretos
if (empty($_POST['email2']) || empty($_POST['senha2'])) {
    header('login.php');
    exit();
}
//as linhas 40 e 41 são variaveis q estão puxando do form os valores da senha e do usuario
$usuario = mysqli_real_escape_string($conexao, $_POST['email2']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha2']);
//da 43 a 59 esta fazendo a verificação se o usuario é unico para depois logar
$query ="SELECT id, usuario from adm where usuario ='{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
   $_SESSION ['email2'] = $usuario;
   header('location:admhome.php');
   exit();
}

else {
    $_SESSION['nao_autenticado'] = true;
header('location:admlogin.php');
exit();
}
?>