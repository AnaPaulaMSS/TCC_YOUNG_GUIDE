<?php
include('conexao.php');
session_start();
$usuario = $_SESSION['email1'];
$sqli = mysqli_query($conexao, "SELECT * FROM usuario WHERE usuario = '$usuario'");
$row = mysqli_fetch_assoc($sqli);
$rw = $row['id'];
$sql = mysqli_query($conexao, "SELECT * FROM curriculo WHERE id_usu = '$rw'");
$row1 = mysqli_num_rows($sql);
$nome = mysqli_real_escape_string($conexao, trim($_POST['um']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['dois']));
$email = mysqli_real_escape_string($conexao, trim($_POST['tres']));
$profissao = mysqli_real_escape_string($conexao, trim($_POST['quatro']));

if ($row1 == 1) {
   echo "<script>alert('Pedido feito anteriormente!');</script>";
   echo "1";
} else if(isset($_FILES['curriculo'])) {
   $fotos = $_FILES['curriculo'];
   $pasta = "curriculo/";
   $nomeDoArquivo = $fotos['name'];
   $novoNomeDoarquivo = uniqid();
   $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

   if ($extensao != "pdf") {
       die("<p style='color: blue; font-size:1.2em'>Tipo de arquivo não aceito</p>");
   }

   $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
   $result = mysqli_query($conexao, $sql);
   $row = mysqli_fetch_assoc($result);
   $row1 = $row['id'];
   $path = $pasta . $novoNomeDoarquivo . "." . $extensao;
   $deu_certo = move_uploaded_file($fotos["tmp_name"], $path);

   if ($deu_certo) {
      $mysqli = mysqli_query($conexao, "INSERT INTO curriculo (nome_completo, idade, email, profissao, path, id_usu) VALUES ('$nome', '$idade', '$email', '$profissao', '$path', '$row1' )");

      if ($mysqli) {
         header('location: home.php');
         echo "<script>alert('Erro ao inserir no banco de dados!');</script>";
      } else {
         echo "<script>alert('Erro ao inserir no banco de dados!');</script>";
         echo "4";
      }
    } // else {
    //  echo "<script>alert('Falha ao mover arquivo!');</script>";
     // echo "3";
   }

?>