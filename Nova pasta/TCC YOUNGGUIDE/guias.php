<html>
    <head>
        <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
        <title>Título do Site</title>
        <meta charset="UTF-8"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        <script src="https://unpkg.com/scrollreveal"></script>
        
        <link rel="stylesheet" href="css/favoritis.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    </head>
    <body>
    <?php
        include('conexao.php');
        include('verifica.php');
        $usuario= $_SESSION['email1'];
        $usuario= $_SESSION['email1'];
        $sql = "SELECT * from usuario where usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
        $row1 = $row['id'];

        $sql= mysqli_query($conexao,"SELECT * FROM fotos where id_usu ='$row1'") or die ($mysqli->error);

        $arquivos= $sql->fetch_assoc();
      ?>
        <div class="header">
            <div class="nav">
                <a style="color:white" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a class="menul" href="home.php"> <h3>Young Guide</h3> </a></div>
                <div class="perfil">
                    <h5><?php echo $_SESSION['email1'];?>
                        <br/> <a class="menul" href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
                </div>
            </div>
        </div>

        <div class="guides">
                <img src="imagens/book.png" style="height: 20vh;">
                <h1>Guides</h1>
        </div>
    <div id='container'>
        <section id='produtos'>
        <?php 
                    $sql = "SELECT * from usuario";
                    $result = mysqli_query($conexao, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $row1 = $row['id'];
                    if ($row1 > 0) {
                    //não esqueça de declarar as chaves estrangeiras
                    $sqli = "SELECT e.id as e, e.usuario, p.titulo, p.conteudo, p.id as p
                    FROM especialista e
                    INNER JOIN postagens p
                    WHERE p.id_esp = e.id";
                    $resulta = mysqli_query($conexao, $sqli);
                    
// Valor dinâmico que você deseja inserir no URL



                    
                
                    while ($lin=$resulta->fetch_assoc()){
                        $parametro= $lin ['p'];
                        $parametro1 = $lin['e'];
                        // Use o PHP para gerar o URL com base no valor dinâmico

                        $url = "postagem.php?parametro=" . urlencode($parametro) . "&parametro1=" . urlencode($parametro1);
                        //$url = "postagem.php?parametro=" . $parametro;
                        //echo $parametro."<br>".$url."<br>";
                        echo"
                        
                        <section class='post'>
                            <a href='$url'>
                                <h2>".$lin['titulo']."</h2>
                                <span>".$lin['usuario']."</span>
                            </a>
                        </section>"
                ;}}
               
            ?>
        </section>
</div>
<footer class="page-footer #ce93d8 purple lighten-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 style="color: black;">Sobre Nós</h5>
                        <p class="texto" style="color: black; font-size:1.2em">Younguide tem como objetivo contribuir com os estudantes que acabaram de sair do Ensino médio e prepará-los para o mercado de trabalho. </p>

                    </div>
                    <div class="col l4 s12 offset-l2">
                        <h5 style="color: black;">Nossas Redes</h5>
                        <ul>
                            <li><a class="purple-text text-darken-1" style="font-size: 1.2em;" href="#">Facebook</a></li>
                            <li><a class="purple-text text-darken-1" style="font-size: 1.2em;" href="#">Twitter</a></li>
                            <li><a class="purple-text text-darken-1" style="font-size: 1.2em;" href="#">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright #ab47bc purple lighten-1">
                <div class="container center-align">
                    &copy; 2023 TCC Young Guide
                </div>
            </div>
        </footer>
        
<!-- Navbar -->
 <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="imagens/office.jpg">
      </div>
      <div href="#user">
        <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
          <p><?php echo $_SESSION['email1'];?></p>
      </div>
    </div></li>

    <li><a href="userconfig.php"><i class="material-icons">settings</i>Configurações de usuário</a></li>
    <li><a href="https://forms.gle/dEkkgYonZGgsygMT9" target="_blank">Questionário</a></li>

    <li><div class="divider"></div></li>

    <li><a class="subheader">Ferramentas</a></li>

    <li><a class="waves-effect" href="home.php"><span class="material-icons">home</span>&nbsp&nbspPágina Principal</a></li>
    <li><a class="waves-effect" href="guias.php"><span class="material-icons">menu_book</span>&nbsp&nbspGuias</a></li>
    <li><a class="waves-effect" href="favoritos.php"><span class="material-icons">favorite_border</span>&nbsp&nbspVer Favoritos</a></li>
    <li><a class="waves-effect" href="salvos.php"><span class="material-icons">bookmark_border</span>&nbsp&nbspSalvos</a></li>
    <li><a class="waves-effect" href="sugestao.php"><span class="material-icons">email</span>&nbsp&nbspMandar Sugestão</a></li>
    <li><a class="waves-effect" href="questionario.php"><span class="material-icons">equalizer</span>&nbsp&nbspDados do questionário</a></li>
    <li><a class="waves-effect" href="form.php"><span class="material-icons">description</span>&nbsp&nbspQuero ser especialista</a></li>
    <li><a class="waves-effect" href="sobre.php">&nbsp&nbspSobre nós</a></li>
    <li><a class="waves-effect" href="logout.php"><span class="material-icons">logout</span>&nbsp&nbspSair da conta</a></li>
  </ul>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
               $('.carousel.carousel-slider').carousel({
                fullWidth: true
                });
                $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
        </script>
        <script>
            window.sr = ScrollReveal({ reset: true });
             sr.reveal('.post', { 
                distance: '100px',
                interval: 600,
                rotate: { x:0, y:0, z:0 },
                duration: 2300
             });
        </script>
    </body>
    
</html>