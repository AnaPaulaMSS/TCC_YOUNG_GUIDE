<html>
    <head>
        <title>Salvos</title>
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
        
        <link rel="stylesheet" href="css/favoritis.css">
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
                <a style="color:white" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a class="menul" href="eshome.php"> <h3>Young Guide</h3> </a></div>
                <div class="perfil">
                    <h5><?php echo $_SESSION['email3'];?>
                        <br/> <a class="menul" href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
                </div>
            </div>
        </div>

        <div class="guides">
                <img src="imagens/bookmark.png" style="height: 10vh;">
                <h1>Salvos</h1>
        </div>
<div id="container">
        <section id="produtos">
        <?php
        $usuario = $_SESSION['email3'];
            // Consulta para pegar a ID da tabela "usuario"
            $sql_usuario = "SELECT * FROM especialista where usuario = '$usuario'";
            $result_usuario = $conexao->query($sql_usuario);
            
            if ($result_usuario->num_rows > 0) {
                // Armazena a ID do usuário
                $user_id = $result_usuario->fetch_assoc()["id"];
            } else {
                $user_id = null;
            }

                $sql = "SELECT * from especialista where usuario = '$usuario'";
                $result = mysqli_query($conexao, $sql);
                $row = mysqli_fetch_assoc($result);
                $row1 = $row['id'];
                if ($row1 > 0) {
                    //não esqueça de declarar as chaves estrangeiras
        

                        // Consulta para pegar os artigos curtidos pelo usuário
                        $sql = "SELECT p.id as p, p.titulo, p.usuario as u,  e.usuario AS especialista 
                        FROM postagens p
                        INNER JOIN salva ON p.id = salva.post_id
                        INNER JOIN especialista e ON salva.esp_id = e.id
                        WHERE salva.esp_id = $user_id";




                        $result = $conexao->query($sql);

                        // Exibe os artigos curtidos pelo usuário
                        if ($result && $result->num_rows > 0) {
                            $index = 0;
                            while ($row = $result->fetch_assoc()) {
                                $parametro = $row['p'];
                        $parametro1 = $row['u'];
                        $url = "esppostagem.php?parametro=" . urlencode($parametro) . "&parametro1=" . urlencode($parametro1);
                                echo "<section class='post'>
                                            <a href='$url'>
                                                <h2>" . $row['titulo'] . "</h2>
                                                <span>" . $row['u'] . "</span>
                                            </a>
                                    </section>";
                            }
                        } else {
                        echo "<h4>Nenhum artigo curtido pelo usuário.</h4>";
                        }
                    }
        ?>
      </section>
</div>

<footer class="page-footer #ce93d8 purple lighten-3" style="margin-top: 5%;">
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