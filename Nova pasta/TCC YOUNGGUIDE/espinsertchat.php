<?php 
include('conexao.php');
session_start();
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo4']));
$valor=$_SESSION['valor8'] ;
$row3=$_SESSION['valor9'] ;
if(!empty($comentario)){
            $cad_artigo = "INSERT INTO chat (comentario, perfil_id, esp_id) VALUES ('{$comentario}', '$valor', '$row3')";
            $artigo = mysqli_query($conexao,$cad_artigo);
            $sql = "SELECT COUNT(*) as total from chat where comentario = '$comentario' and esp_id = '$row3'";
            $result = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<script>window.location.href = "eshome.php";</script>';
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
    }
?>