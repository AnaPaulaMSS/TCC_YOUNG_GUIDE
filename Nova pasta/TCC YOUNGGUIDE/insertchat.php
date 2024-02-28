<?php 
include('conexao.php');
session_start();
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo3']));
$usuario= $_SESSION['email1'];
$valor=$_SESSION['valor6'] ;
$row3=$_SESSION['valor7'] ;
if(!empty($comentario)){
            $cad_artigo = "INSERT INTO chat (comentario, perfil_id, user_id) VALUES ('{$comentario}', '$valor', '$row3')";
            $artigo = mysqli_query($conexao,$cad_artigo);
            $sql = "SELECT COUNT(*) as total from chat where comentario = '$comentario' and user_id = '$row3'";
            $result = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<script>window.location.href = "home.php";</script>';
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
    }
?>