<?php 
include("admconfig.php");
$usuario1= $_SESSION['email2'];   
$usuario = mysqli_real_escape_string($conexao, $_POST['form4_email']);
$senha = mysqli_real_escape_string($conexao, $_POST['form4_senha']);


    $query ="SELECT id, usuario, conta from adm where usuario ='{$usuario}' and senha = md5('{$senha}')";
    $result = mysqli_query($conexao, $query);
    if ($usuario1 == $usuario ) {
    $sqlUpdate ="UPDATE adm set conta='f' where usuario = '{$usuario}' and senha = md5('{$senha}')";
    $update=mysqli_query($conexao, $sqlUpdate);

    echo '<script>window.location.href = "index.html";</script>';
}
else {
    echo "<script>alert('Usuário ou senha incorretos');</script>";
}
//var_dump($update);
//header('location:cadastro.php');

//else {
 //header('location:home.php');  
//}
?>
