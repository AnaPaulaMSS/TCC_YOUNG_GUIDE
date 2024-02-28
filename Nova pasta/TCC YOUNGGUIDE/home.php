<html>
    <head>
        <title>Young guide!</title>
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
        
        <link rel="stylesheet" href="css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/slider.js" defer></script>

        <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">

    </head>
    <body>


    <?php
        include('conexao.php');
        include('verifica.php');
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
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a href="home.php"><h3>Young Guide</h3> </a></div>
                <div class="perfil">
                    <h5><?php echo $_SESSION['email1'];?>
                        <br/> <a href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
                </div>
            </div>
        </div>

        <!--Sessão 1-->
        <div class="caramba">

            <div class="carousel carousel-slider">
                <a class="carousel-item" href="#one!"><img src="imagens/1.jpg"></a>
                <a class="carousel-item" href="#two!"><img src="imagens/2.jpg"></a>
                <a class="carousel-item" href="#three!"><img src="imagens/3.jpg"></a>
                <a class="carousel-item" href="#four!"><img src="imagens/4.jpg"></a>
              </div>
        </div>
        <!--Sessão 2-->
        <div class="postagens">
            <div class="guides">
                <img src="imagens/book.png" class="book">
                <h1>Guides</h1>
            </div>
            <div class="post">
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <ul class="carosel">
                    <?php 
                     $sql = "SELECT * from usuario";
                     $result = mysqli_query($conexao, $sql);
                     $row = mysqli_fetch_assoc($result);
                     $row1 = $row['id'];
                     if ($row1 > 0) {
                     //não esqueça de declarar as chaves estrangeiras
                     $sqli = "SELECT e.id as e, e.usuario, f.PATH, p.titulo, p.conteudo, p.id as p
                     FROM especialista e
                     INNER JOIN fotos f
                     INNER JOIN postagens p
                     WHERE p.id_esp = e.id AND f.id_esp = e.id";
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
                        
                        <li class='card'>
                            <a href='$url'>
                                <h2>".$lin['titulo']."</h2>
                                <span>".$lin['usuario']."</span>
                            </a>
                        </li>"
                ;}}
               
            ?>

                    </ul>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </div>
        <!--Sessão 3-->
        <div class="questionario container">
            <h1 class="titulo">Veja a situação do momento também</h1>
            <div class="grafico">
            <iframe width="600" height="600"  seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS9QOnS-TYSYvcYv_Lmk2aLYEILHhMSN6hVXcmge0NPPpfrCEJt6AT3dKagU06eE72tDWLgXTf3IMsZ/pubchart?oid=1795536298&amp;format=interactive"></iframe>
            </div>
            <div class="conteudo">
                <h4>Em seu ensino médio ou fundamental, você aprendeu a elaborar um currículo?</h4>
                <button id="quest" onclick="window.location.href='https://forms.gle/dEkkgYonZGgsygMT9'">Responda o seu questionário também!</button>
            </div>
        </div>

                <!--Sessão 3-->
        <div class="especialistas">
                <h1>especialistas</h1>
                <div class="perfils">
                <?php //não esqueça de declarar as chaves estrangeiras
                     $sql = "SELECT e.id as e, e.usuario as usuario, f.PATH as foto
                     FROM especialista e
                     INNER JOIN fotos f
                     WHERE f.id_esp = e.id";
            $result = mysqli_query($conexao, $sql);
           
                    while ($row2=$result->fetch_assoc()){
                        $parametro2= $row2 ['e'];
                        // Use o PHP para gerar o URL com base no valor dinâmico

                        $url1 = "perfil.php?parametro=" . urlencode($parametro2);
                       echo" <div class='esp'>
                    <img class='circle responsive-img' src='" .$row2['foto']."' >
                    <a href='$url1'>
                    <h2> ".$row2['usuario']."</h2></a>
                    <p>Profissão</p> <br> </div>"
                ;}?>
                    
                </div>
        </div>

        
        <!--Sessão 4-->
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
            sr.reveal('.postagens', { 
                rotate: { x:100, y:0, z:0 },
                duration: 2300
             });
             sr.reveal('.questionario', { 
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.especialistas', { 
                rotate: { x:100, y:0, z:0 },
                duration: 2300
             });
        </script>

    </body>
</html>