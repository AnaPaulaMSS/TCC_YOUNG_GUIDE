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
    <body>
        <div class="fundo">
            <div class="container">
                <div class="cad_modal">
                    <div class="m_tit"><h1><b>Cadastro!</b></h1><br></div>
                    <form method="post">
                        <input class="um" placeholder="    Usuário" type="text" name="email2"> <br>
                        <input class="um" placeholder="    Senha" type="password" name="senha2"> <br>
                        <input id="entrar" type="submit" value="Logar">
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</body>
</html>
<?php
session_start();
//o include puxa os dados do arquivo no conexao esta sendo puxados os dados do banco de dados
include("conexao.php");
//as variaveis usuario e senha estão puxando o valor inserido no form para serem armazenados no banco
$usuario = mysqli_real_escape_string($conexao, trim($_POST['email2']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha2'])));
// da linha 44 a 53 o codigo esta fazendo uma verificação se o usuario da variavel usuario ja existe no banco
$sql = "SELECT COUNT(*) as total from adm where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total']>0) {
   $_SESSION ['usuario ja existe']=true;
   header('admcadastro.html');
   exit;
}
//da linha 47 a 51 esta fazendo a inserção do usuario e da senha no banco de dados
$sql= "INSERT INTO adm (usuario, senha, conta) VALUES ('$usuario','$senha', 'v')";
if($conexao-> query($sql) === TRUE) {
   $_SESSION['status_cadastro'] = true; 
}
//na linha 53 esta sendo encerrada a conexão e na 54 caso tudo tenha corrido corretamente vai ser redirecionado para a pagina de login
$conexao->close();
header('location: admlogin.php');
exit;
?>