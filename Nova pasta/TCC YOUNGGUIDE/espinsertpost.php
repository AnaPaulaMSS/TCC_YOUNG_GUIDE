<?php

include('espost.php');
$usuario= $_SESSION['email3'];
$titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
$conteudo = mysqli_real_escape_string($conexao, trim($_POST['conteudo']));

if(!empty($titulo && $conteudo)){
    $sql = "SELECT * from especialista where usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $row1 = $row['id'];
    
    
    $cad_artigo = "INSERT INTO postagens (titulo, conteudo, permissao, id_esp, usuario) VALUES ('{$titulo}', '{$conteudo}', 's', '$row1', '$usuario' )";
    $artigo = mysqli_query($conexao,$cad_artigo);
    $sql = "SELECT COUNT(*) as total from postagens where titulo = '$titulo' and conteudo = '$conteudo'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row !== 1){
        echo "<script>alert('Postagem cadastrada com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Postagem não cadastrada corretamente!');</script>";
    }
}
        ?>