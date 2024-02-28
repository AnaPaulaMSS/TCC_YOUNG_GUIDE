<?php
include('admesp.php');
$_SESSION['valorEspecifico3'];
if(!empty($_SESSION['valorEspecifico'] && $_SESSION['valorEspecifico1'])){ 
$l=$_SESSION['valorEspecifico'] ;

$op= $_POST['group1'];
    switch ($op) {
        case 'M':
            $query ="SELECT * from curriculo where id ='{$l2}'";
            $result = mysqli_query($conexao, $query);
            $sqlUpdate ="UPDATE curriculo set resultado='a' where id = '{$l2}'";
            $update=mysqli_query($conexao, $sqlUpdate);
            echo '<script>window.location.href = "admsugestoesaprov.php";</script>';
            break;
        case 'n':
            $query ="SELECT * from curriculo where id ='{$l2}'";
            $result = mysqli_query($conexao, $query);
            $sqlUpdate ="UPDATE curriculo set resultado='n' where id = '{$l2}'";
            $update=mysqli_query($conexao, $sqlUpdate);
            echo '<script>window.location.href = "admlix.php";</script>';
            break;
 
    }
}

?>