<?php
include('administradorsug.php');
$_SESSION['valorEspecifico'];
$_SESSION['valorEspecifico1'];
$_SESSION['valorEspecifico2'];
$_SESSION['valorEspecifico3'];
if(!empty($_SESSION['valorEspecifico'] && $_SESSION['valorEspecifico1'])){ 
$l=$_SESSION['valorEspecifico'] ;
$li=$_SESSION['valorEspecifico1'] ;
$op= $_POST['group1'];
    switch ($op) {
        case 'M':
            $query ="SELECT id, titulo, conteudo from artigos where titulo ='{$l}' and conteudo = '{$li}' and permissao = 's'";
            $result = mysqli_query($conexao, $query);
            $sqlUpdate ="UPDATE artigos set permissao='a' where titulo = '{$l}' and conteudo = '{$li}'";
            $update=mysqli_query($conexao, $sqlUpdate);
            echo '<script>window.location.href = "admsugestoesaprov.php";</script>';
            break;
        case 'n':
            $query ="SELECT id, titulo, conteudo from artigos where titulo ='{$l}' and conteudo = '{$li}' and permissao = 's'";
            $result = mysqli_query($conexao, $query);
            $sqlUpdate ="UPDATE artigos set permissao='n' where titulo = '{$l}' and conteudo = '{$li}'";
            $update=mysqli_query($conexao, $sqlUpdate);
            echo '<script>window.location.href = "admlix.php";</script>';
            break;
 
    }
}
if(!empty($_SESSION['valorEspecifico2'] && $_SESSION['valorEspecifico3'])){ 
    $l1= $_SESSION['valorEspecifico2'];
    $li1=$_SESSION['valorEspecifico3'];
    $op1= $_POST['group2'];
        switch ($op1) {
            case 'M':
                $query ="SELECT id, titulo, conteudo from artigos where titulo ='{$l1}' and conteudo = '{$li1}' and permissao = 's'";
                $result = mysqli_query($conexao, $query);
                $sqlUpdate ="UPDATE artigos set permissao='a' where titulo = '{$l1}' and conteudo = '{$li1}'";
                $update=mysqli_query($conexao, $sqlUpdate);
                echo '<script>window.location.href = "admsugestoesaprov.php";</script>';
                break;
            case 'n':
                $query ="SELECT id, titulo, conteudo from artigos where titulo ='{$l1}' and conteudo = '{$li1}' and permissao = 's'";
                $result = mysqli_query($conexao, $query);
                $sqlUpdate ="UPDATE artigos set permissao='n' where titulo = '{$l1}' and conteudo = '{$li1}'";
                $update=mysqli_query($conexao, $sqlUpdate);
                echo '<script>window.location.href = "admlix.php";</script>';
                break;
     
        }
    }
?>