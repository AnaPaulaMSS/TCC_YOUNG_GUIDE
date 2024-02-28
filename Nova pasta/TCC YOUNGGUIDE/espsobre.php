<html>
    <head>
        <title>Young guide!</title>
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
        
        <link rel="stylesheet" href="css/sobre.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    </head>
    <body>
    <?php
        include('conexao.php');
        include('esverifica.php');
        $usuario= $_SESSION['email3'];
        $sql = "SELECT * from especialista where usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
        $row1 = $row['id'];

        $sql= mysqli_query($conexao,"SELECT * FROM fotos where id_esp ='$row1'") or die ($mysqli->error);

        $arquivos= $sql->fetch_assoc();
      ?>
        <div class="header">
            <div class="nav">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a href="eshome.php"><h3>Young Guide</h3></a></div>
                <div class="perfil">
                    <h5><?php echo $_SESSION['email3'];?>
                        <br/> <a href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
                </div>
            </div>
        </div>

        <div class="sobre">
          <h1 class="center-align" style="font-size: 6.0em;">Young Guide</h1>
          <h5 class="center-align container">
          Young Guide é um projeto de Sistema para Web da ETEC Bartolomeu Bueno da Silva - Anhanguera, desenvolvido pelos alunos Ana Paula, Luís e Gustavo Henrique que pretende motivar, incentivar e facilitar a vida dos alunos pós-estudos.
          </h5>

        </div>


        <div class="equipe">
          <div class="pessoa1">
            <h1 class="center-align" style="color: white;">Ana Paula</h1>
            <h5>Front end</h5>

            <img src="imagens/ana.png" width="100%">
          </div>

          <div class="pessoa2">
            <h1 class="center-align" style="color: white;">Gustavo</h1>
            <h5>Back end</h5>

            <img src="imagens/Gustavo.png" width="100%">
          </div>

          <div class="pessoa3">
            <h1 class="center-align" style="color: white;">Luís</h1>
            <h5>Escrita</h5>

            <img src="imagens/luis.png" width="120%">
          </div>
        </div>

        <div class="ana">
            <h1 style="color:#303030; font-size:6.0em;">Ana Paula</h1>
            <h4>18 anos</h4>
            <div class="texto container">
              <p>Olá, me chamo Ana Paula, e eu atuei no front end o que seria tudo que você está vendo nessa tela!  também na Administração.</p>
            </div>
            <img src="imagens/ana.png" width="20%">
            <h5>Design | HTML | CSS | JavaScript | Excel</h5>
        </div>
        <div class="gustavo">
          <h1 style="color:#303030; font-size:6.0em;">Gustavo</h1>
              <h4>18 anos</h4>
              <div class="texto container">
                <p>Olá, me chamo Gustavo, e eu atuei no backend o que seria os mecanismos que estão rodando por trás do site. </p>
              </div>
              <img src="imagens/gustavo.png" width="20%">
              <h5>PHP | MYSQ</h5>
        </div>
        <div class="luis">
          <h1 style="color:#303030; font-size:6.0em;">Luís</h1>
              <h4>18 anos</h4>
              <div class="texto container">
                <p>Olá, me chamo Luís, e eu atuei na parte escrita o que seria tudo que envolvia a escrita ou pesquisa. Também trabalhei um pouco de backend. </p>
              </div>
              <img src="imagens/luis.png" width="20%">
              <h5>Word | PHP | Gloogle Forms</h5>
        </div>

        <footer class="page-footer #f5f5f5 grey lighten-4">
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
            <div class="footer-copyright #ce93d8 purple lighten-3">
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
          <p><?php echo $_SESSION['email3'];?></p>
      </div>
    </div></li>

    <li><a href="espconfig.php"><i class="material-icons">settings</i>Configurações de usuário</a></li>
    <li><a href="https://forms.gle/dEkkgYonZGgsygMT9" target="_blank">Questionário</a></li>

    <li><div class="divider"></div></li>

    <li><a class="subheader">Ferramentas</a></li>

    <li><a class="waves-effect" href="eshome.php"><span class="material-icons">home</span>&nbsp&nbspPágina Principal</a></li>
    <li><a class="waves-effect" href="espguias.php"><span class="material-icons">menu_book</span>&nbsp&nbspGuias</a></li>
    <li><a class="waves-effect" href="espfavoritos.php"><span class="material-icons">favorite_border</span>&nbsp&nbspVer Favoritos</a></li>
    <li><a class="waves-effect" href="espsalvos.php"><span class="material-icons">bookmark_border</span>&nbsp&nbspSalvos</a></li>
    <li><a class="waves-effect" href="espost.php"><span class="material-icons">edit</span>&nbsp&nbspCriar guia</a></li>
    <li><a class="waves-effect" href="espsugestao.php"><span class="material-icons">email</span>&nbsp&nbspMandar Sugestão</a></li>
    <li><a class="waves-effect" href="espquestionario.php"><span class="material-icons">equalizer</span>&nbsp&nbspDados do questionário</a></li>
    <li><a class="waves-effect" href="espsobre.php">&nbsp&nbspSobre nós</a></li>
    <li><a class="waves-effect" href="eslogout.php"><span class="material-icons">logout</span>&nbsp&nbspSair da conta</a></li>
  </ul>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
                $(document).ready(function(){
                    $('.sidenav').sidenav();
                });

            window.sr = ScrollReveal({ reset: true });
            sr.reveal('.sobre', { 
              distance: '300px',
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });

             sr.reveal('.pessoa1', { 
                distance: '200px',
                rotate: { x:0, y:0, z:0 },
                duration: 2000
             });
             sr.reveal('.pessoa2', { 
                distance: '200px',
                delay: 900,
                rotate: { x:0, y:0, z:0 },
                duration: 2000
             });
             sr.reveal('.pessoa3', { 
                distance: '200px',
                delay: 1500,
                rotate: { x:0, y:0, z:0 },
                duration: 2000
             });

             sr.reveal('.ana', { 
                distance: '200px',
                rotate: { x:10, y:10, z:0 },
                duration: 2300
             });
             sr.reveal('.gustavo', { 
                distance: '200px',
                rotate: { x:10, y:10, z:0 },
                duration: 2300
             });
             sr.reveal('.luis', { 
              distance: '200px',
                rotate: { x:10, y:10, z:0 },
                duration: 2300
             });
        </script>
    </body>
</html>