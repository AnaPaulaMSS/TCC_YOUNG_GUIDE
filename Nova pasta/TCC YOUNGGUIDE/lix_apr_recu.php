<?php
include('admlix.php');
$_SESSION['valorEspecifico4'];

if(!empty($_SESSION['valorEspecifico4'])){ 
    $l2= $_SESSION['valorEspecifico4'];
   
    $op= $_POST['group1'];
        switch ($op) {
            case 'M':
                $query ="SELECT * from artigos where id ='{$l2}'";
                $result = mysqli_query($conexao, $query);
                $sqlUpdate ="UPDATE artigos set permissao='s' where id = '{$l2}'";
                $update=mysqli_query($conexao, $sqlUpdate);
                echo '<script>window.location.href = "administradorsug.php";</script>';
                break;
            case 'n':
                $query ="SELECT * from artigos where id ='{$l2}' ";
                $result = mysqli_query($conexao, $query);
                $sqlUpdate ="DELETE FROM artigos where id = '{$l2}' ";
                $update=mysqli_query($conexao, $sqlUpdate);
                echo '<script>window.location.href = "administradorsug.php";</script>';
                break;
     
        }
    }
?>