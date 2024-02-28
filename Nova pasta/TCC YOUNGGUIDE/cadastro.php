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
    <title>Cadastro</title>

    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
</head>
<body>
    <body>
        <div class="fundo">
            <div class="container">
                <div class="cad_modal">
                    <div class="m_tit"><h1><b>Cadastro!</b></h1><br></div>
                    <form method="post">
                        <input class="um" placeholder="    Usuário" type="text" name="email"> <br>
                        <input class="um" placeholder="    Senha" type="password" name="senha"> <br>
                        <input id="entrar" type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</body>
</html>
<?php
session_start();
//os includes puxam os dados dos arquivos no conexao puxam os dados do banco de dados 
include("conexao.php");
//as variaveis usuario e senha estão puxando o valor inserido no form para serem armazenados no banco
$usuario = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
// da linha 41 a 49 o codigo esta fazendo uma verificação se o usuario da variavel usuario ja existe no banco
$sql = "SELECT COUNT(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total']>0) {
   $_SESSION ['usuario ja existe']=true;
   header('cadastro.html');
   exit;
}
//da linha 50 a 54 esta fazendo a inserção do usuario e da senha no banco de dados
$sql= "INSERT INTO usuario (usuario, senha, conta) VALUES ('$usuario','$senha','v')";
if($conexao-> query($sql) === TRUE) {
   $_SESSION['status_cadastro'] = true; 
}
//na linha 56 esta sendo encerrada a conexão e na 57 caso tudo tenha corrido corretamente vai ser redirecionado para a pagina de login
$conexao->close();
header('location: login.php');
exit;
?>