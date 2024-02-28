<?php 


$comentario= mysqli_real_escape_string($conexao, trim($_POST['conteudo']));
$valores = $_GET['parametro'];
$valores1 = $_GET['valor1'];


if(!empty($comentario)){
    $sql = "SELECT * from especialista where usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $row1 = $row['id'];
    
    
    $cad_artigo = "INSERT INTO comentarios (comentario, post_id, esp_id) VALUES ('{$comentario}', '$valores' '$row1')";
    $artigo = mysqli_query($conexao,$cad_artigo);
    $sql = "SELECT COUNT(*) as total from comentarios where comentario = '$comentario' and esp_id = '$row1'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row == 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
}
        ?>