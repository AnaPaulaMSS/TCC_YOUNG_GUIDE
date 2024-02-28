<?php

include('espsugestao.php');
$titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
$conteudo = mysqli_real_escape_string($conexao, trim($_POST['conteudo']));

if(!empty($titulo && $conteudo)){
    $sql = "SELECT * from especialista where usuario = '$usuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $row1 = $row['id'];
    
    
    $cad_artigo = "INSERT INTO artigos (titulo, conteudo, permissao, id_esp) VALUES ('{$titulo}', '{$conteudo}', 's', '$row1')";
    $artigo = mysqli_query($conexao,$cad_artigo);
    $sql = "SELECT COUNT(*) as total from artigos where titulo = '$titulo' and conteudo = '$conteudo'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

if ($row['total']>0) {
    echo "<script>alert('Artigo cadastrado com sucesso!');</script>";
 
   exit;
}
    


   

    if($row == 1){
        echo "<script>alert('Artigo cadastrado com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Artigo não cadastrado corretamente!');</script>";
    }
}
        ?>