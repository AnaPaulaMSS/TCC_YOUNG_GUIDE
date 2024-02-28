<html>
    <head>
        <title>Dados do questionario</title>
        <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
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
        
        <link rel="stylesheet" href="css/quest.css">
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
                <div class="logo"><a href="home.php"><h3>Young Guide</h3></a></div>
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
                <img src="imagens/bibi.jpg" width="100%"/>  
            </div>
            <div class="destaque">
                    <h1 class="white-text">Dados do Questionário</h1>
                    <div class="exp">
                        <p>
                        Young Guide é um projeto de Sistema para Web da ETEC Bartolomeu Bueno da Silva - Anhanguera, desenvolvido pelos alunos Ana Paula, Luís e Gustavo Henrique que pretende motivar, incentivar e facilitar a vida dos alunos pós-estudos. Este  formulário tem como objetivo de pesquisa a arrecadação de informações para o projeto. 
                        </p>
                        <p>Nessa página, você podera ver alguns resultados.</p>
                    </div>
            </div>
            
        <!--Sessão 2-->

        <div class="questionario1 container">
            <div class="grafico1">
                <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS9QOnS-TYSYvcYv_Lmk2aLYEILHhMSN6hVXcmge0NPPpfrCEJt6AT3dKagU06eE72tDWLgXTf3IMsZ/pubchart?oid=1795536298&amp;format=interactive"></iframe>
            </div>
                <div class="conteudo1">
                    <h4>Em seu ensino médio ou fundamental, você aprendeu a elaborar um currículo?</h4>
            </div>
        </div>

        <!--Sessão 3-->
        <div class="questionario2 container">
            <div class="conteudo2 container">
                    <h4>Na sua instituição, você adquiriu algum conhecimento sobre esses os termos IPTU, INSS, FGTS, CPF, etc.?</h4>
                </div>
            <div class="grafico2">
                <iframe width="600" height="500" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS9QOnS-TYSYvcYv_Lmk2aLYEILHhMSN6hVXcmge0NPPpfrCEJt6AT3dKagU06eE72tDWLgXTf3IMsZ/pubchart?oid=983653963&amp;format=interactive"></iframe>
            </div>
        </div>

        <!--Sessão 4-->

        <div class="questionario3 container">
            <div class="conteudo3">
                    <h4>Em relação ao novo ensino médio, qual a sua opinião em sair preparado para uma próxima fase?</h4>
            </div>
            <div class="grafico3">
                <iframe width="600" height="500" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS9QOnS-TYSYvcYv_Lmk2aLYEILHhMSN6hVXcmge0NPPpfrCEJt6AT3dKagU06eE72tDWLgXTf3IMsZ/pubchart?oid=1078034066&amp;format=interactive"></iframe>
            </div>
        </div>

        <!--Sessão 4-->
        <div class="questionario4 container">
            <div class="conteudo4 container">
                <h4>O que você acharia de um site que pudesse ensinar a você mais sobre a vida após a escola?</h4>
            </div>
            <div class="grafico4">
                <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vS9QOnS-TYSYvcYv_Lmk2aLYEILHhMSN6hVXcmge0NPPpfrCEJt6AT3dKagU06eE72tDWLgXTf3IMsZ/pubchart?oid=2033412157&amp;format=interactive"></iframe>
            </div>
        </div>
        
        <!--Sessão 5-->
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
            sr.reveal('.destaque', { 
                distance:'100px',
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.questionario1', { 
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.questionario2', { 
                distance: '100px',
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.questionario3', { 
                distance: '200px',
                rotate: { x:0, y:0, z:0 },
                duration: 2300
             });
             
             sr.reveal('.questionario4', { 
                distance: '100px',
                rotate: { x:100, y:0, z:0 },
                duration: 2300
             });
        </script>


    </body>
</html>