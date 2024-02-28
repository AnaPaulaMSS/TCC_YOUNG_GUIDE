<?php 
include('admperfil.php');
$usuario= $_SESSION['email2'];
$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo']));


if(!empty($titulo && $conteudo)){
    $sql = "SELECT * from adm where usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $row1 = $row['id'];
    
    
    $cad_artigo = "INSERT INTO comentarios (comentario, adm_id) VALUES ('{$comentario}', '$row1')";
    $artigo = mysqli_query($conexao,$cad_artigo);
    $sql = "SELECT COUNT(*) as total from comentarios where comentario = '$comentario' and adm_id = '$row1'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
}
        ?>