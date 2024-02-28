<?php
include('admsugestoesaprov.php');


if(!empty($_SESSION['valorEspecifico5'])){ 
    $l2= $_SESSION['valorEspecifico5'];
    $op= $_POST['group1'];
        switch ($op) {
            case 'M':

                $sqlUpdate ="DELETE FROM artigos where id = {$l2} ";
                $update=mysqli_query($conexao, $sqlUpdate);
                echo '<script>window.location.href = "admsugestoesaprov.php";</script>';;
                break;
     
        }
    }
?>