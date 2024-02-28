
<?php
session_start();
include ('conexao.php');
$usuario= $_SESSION['email3'];
$sqli= mysqli_query($conexao,"SELECT * FROM especialista where usuario= '$usuario'");
$row = mysqli_fetch_assoc($sqli);
$rw = $row['id'];
$sql= mysqli_query($conexao,"SELECT * FROM fotos where id_esp= '$rw'") or die ($mysqli->error);
$row1 = mysqli_num_rows($sql);

    if (isset($_FILES['foto']) && $row1 == 1) {
        $fotos = $_FILES['foto'];
        $pasta = "arquivos/";
        $nomeDoArquivo = $fotos ['name'];
        $novoNomeDoarquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao !="jpg" && $extensao != 'png' && $extensao != 'jfif') 
        die("Tipo de arquivo não aceito");

        $path = $pasta . $novoNomeDoarquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($fotos["tmp_name"], $path);
    if($deu_certo){
    $mysqli=mysqli_query($conexao,"UPDATE fotos set path = '{$path}' where id_esp = '{$rw}'") or die ($mysqli->error);
    }}

else if (isset($_FILES['foto'])) {
    $fotos = $_FILES['foto'];
    $pasta = "arquivos/";
    $nomeDoArquivo = $fotos ['name'];
    $novoNomeDoarquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao !="jpg" && $extensao != 'png' && $extensao != 'jpeg' && $extensao != 'jfif') 
        die("<p style='color: blue; font-size:1.2em'>Tipo de arquivo não aceito</p>");
        $sql = "SELECT * from especialista where usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
        $row1 = $row['id'];

        $path = $pasta . $novoNomeDoarquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($fotos["tmp_name"], $path);
    if($deu_certo){
    $mysqli=mysqli_query($conexao,"INSERT INTO fotos (path, id_esp) VALUES ('$path', '$row1' )") or die ($mysqli->error);
    echo "<p>arquivo enviado com sucesso!<p>";}
    else 
        echo "<p>falha</p>";
    
}
header('location:eshome.php');
//$sql= mysqli_query($conexao,"SELECT * FROM fotos") or die ($mysqli->error);

//$arquivos= $sql->fetch_assoc();
//echo $arquivos['PATH'];
//?>
//


