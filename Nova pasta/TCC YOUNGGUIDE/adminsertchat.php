<?php 
include('conexao.php');
session_start();
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo5']));
$valor=$_SESSION['valor10'] ;
$row3=$_SESSION['valor11'] ;
if(!empty($comentario)){
            $cad_artigo = "INSERT INTO chat (comentario, perfil_id, adm_id) VALUES ('{$comentario}', '$valor', '$row3')";
            $artigo = mysqli_query($conexao,$cad_artigo);
            $sql = "SELECT COUNT(*) as total from chat where comentario = '$comentario' and adm_id = '$row3'";
            $result = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<script>window.location.href = "admhome.php";</script>';
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
    }
?>