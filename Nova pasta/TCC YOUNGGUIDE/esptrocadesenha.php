<?php 

include("espconfig.php");


$usuario= $_SESSION['email3'];   
$usuario1 = mysqli_real_escape_string($conexao, $_POST['form3_usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['form3_senha']);
if ($usuario == $usuario1 ) {
//$query ="SELECT id, usuario, senha from usuario where usuario ='{$usuario}'";

//$result = mysqli_query($conexao, $query);

$sqlUpdate ="UPDATE especialista set senha = md5('{$senha}') where usuario = '{$usuario}'";

$update = mysqli_query($conexao, $sqlUpdate);
echo "<script>alert('Senha alterada!');</script>";
}
else {
    echo "<script>alert('Erro ao alterar senha, verifique se o nome de usuario esta correto');</script>";
}
//var_dump($update);
//header('location:cadastro.php');
?>