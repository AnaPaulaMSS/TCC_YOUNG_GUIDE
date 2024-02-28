<?php 
include('conexao.php');
session_start();
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo1']));
$_SESSION['valor'];
$_SESSION['valor1'];
$valor=$_SESSION['valor'] ;
$row3=$_SESSION['valor1'] ;
if(!empty($comentario)){
            $cad_artigo = "INSERT INTO comentarios (comentario, post_id, user_id) VALUES ('{$comentario}', '$valor', '$row3')";
            $artigo = mysqli_query($conexao,$cad_artigo);
            $sql = "SELECT COUNT(*) as total from comentarios where comentario = '$comentario' and user_id = '$row3'";
            $result = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<script>window.location.href = "guias.php";</script>';
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
    }
?>