<?php 
include('conexao.php');
session_start();
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo']));
$_SESSION['valor2'];
$_SESSION['valor3'];
$valor=$_SESSION['valor2'] ;
$row3=$_SESSION['valor3'] ;
if(!empty($comentario)){
            $cad_artigo = "INSERT INTO comentarios (comentario, post_id, esp_id) VALUES ('{$comentario}', '$valor', '$row3')";
            $artigo = mysqli_query($conexao,$cad_artigo);
            $sql = "SELECT COUNT(*) as total from comentarios where comentario = '$comentario' and esp_id = '$row3'";
            $result = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<script>window.location.href = "espguias.php";</script>';
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
    }
?>