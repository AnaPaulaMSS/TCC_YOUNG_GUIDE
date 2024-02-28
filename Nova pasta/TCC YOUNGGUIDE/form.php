<html>
    <head>
        <title>Formulário</title>
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
        
        <link rel="stylesheet" href="css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    </head>
    <body onwheel="handleWheel(event)">

        <script>
        let isScrolling = false;

        function handleWheel(event) {
            event.preventDefault(); // Impede o comportamento padrão do scroll

            if (!isScrolling) {
            isScrolling = true;

            let delta = Math.max(-1, Math.min(1, event.deltaY || event.wheelDelta)); // Detecta a direção do scroll
            let scrollSpeed = 200; // Ajusta a velocidade de scroll

            window.requestAnimationFrame(function() {
                window.scrollBy(20, delta * scrollSpeed); // Ajusta a posição de scroll com base na direção e velocidade
                isScrolling = false;
            });
            }
        }
        </script>
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
        

        <div class="formulario container">
        <h1 class="titulo">Quero ser especialista</h1>
            <form method="POST" action="insertform.php" class="container" enctype= "multipart/form-data">

                        <label for="um">1. Nome completo: </label>
                        <input  placeholder="Insira sua resposta aqui" type="text" name="um"> <br>

                        <label for="dois"> 2. Idade: </label>
                        <input  placeholder="Insira sua resposta aqui" type="number" name="dois"> <br>

                        <label for="tres"> 3. Email: </label>
                        <input  placeholder="Insira sua resposta aqui" type="email" name="tres"> <br>

                        <label for="quatro"> 4. Profissão: </label>
                        <input  placeholder="Insira sua resposta aqui" type="text" name="quatro"> <br> <br>

                        <label class="curriculo" for="files">Insira seu curriculo
                        <output id="result">
                        </label>
                        <input id="files" type="file" name="curriculo" />

                        <input class="enviar align-center" type="submit" value="enviar"/>

            </form>
        </div>

        <script>
            function handleFileSelect() {
            var output = document.getElementById("result");
            arquivos = $("#files").prop("files");
            var nomes = $.map(arquivos, function(val) { return val.name; });
            for(x=0;x<nomes.length;x++){
                var extensao = nomes[x].split('.').pop().toLowerCase();
                var nome = nomes[x].substring(nomes[x].lastIndexOf("/"),nomes[x].length);
                var div = document.createElement("div");
                if(extensao == "doc" || extensao == "docx"){
                    icone = "http://jonvilma.com/images/word-14.jpg";
                }else if(extensao == "pdf"){
                    icone = "http://iconbug.com/data/5b/507/52ff0e80b07d28b590bbc4b30befde52.png";
                }else{
                    icone = "https://orig01.deviantart.net/244d/f/2013/087/8/0/no_icon_by_slamiticon-d5z70lm.png";
                }
                div.innerHTML = "<img src='"+icone+"' height='24' /> "+nome;
                output.insertBefore(div, null);
            }
        }

        document.getElementById('files').addEventListener('change', handleFileSelect, false);
        </script>

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
                $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
        </script>
         	<script>
            window.sr = ScrollReveal({ reset: true });
            sr.reveal('.titulo', { 
                rotate: { x:100, y:0, z:0 },
                duration: 2300
             });
             sr.reveal('label', { 
                distance: '100px',
                interval: 300,
                rotate: { x:0, y:0, z:0 },
                duration: 2300
             });

        </script>
    </body>
</html>