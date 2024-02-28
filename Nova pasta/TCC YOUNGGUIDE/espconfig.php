<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/userconfig.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Configurações</title>
    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
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
            </div>
        </div>

    <div class="containe">
        <div class="quad">
            <div class="perfil">
                    <img class="circle" src="<?php echo $arquivos['PATH'];?>">
                    <h2><?php echo $_SESSION['email3'];?></h2>
            </div>
            <div class="ferramentas">
                <h1>Ferramentas</h1>

                
                <ul class="collapsible">
                    <li>
                    <div class="collapsible-header"><i class="material-icons">account_circle</i>Trocar foto de perfil</div>
                    <div class="collapsible-body">
                        <form id="form1"enctype="multipart/form-data" method="post" action= "espuploudefotos.php">
                            <input class="foto" type="file" name="foto">
                            <input id="enviar" type="submit" value="Enviar >">
                        </form>
                    </div>
                    </li>
                    <li>
                    <div class="collapsible-header"><i class="material-icons">lock</i>Mudar senha</div>
                    <div class="collapsible-body">
                    <form id="form3" method="post" action= "esptrocadesenha.php">
                            <input class="um" placeholder="    usuario" type="text" name="form3_usuario">
                            <input class="dois" placeholder="    Alterar senha" type="password" name="form3_senha">
                            <input id="enviar" type="submit" value="Enviar2 >">
                    </form>
                    </div>
                    </li>
                    <li>
                    <div class="collapsible-header"><i class="material-icons">clear</i>Deletar conta</div>
                    <div class="collapsible-body">
                        <form id="form4" method="post" action= "espdelete.php">
                            <input class="tres" placeholder="    Nome de usuario" type="text" name="form4_email">
                            <input class="quatro" placeholder="    senha" type="password" name="form4_senha">
                            <input id="enviar1" type="submit" value="Deletar " >
                        </form>
                        
                    </div>
                    </li>
                </ul>
            </div>
        </div>
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

  
      <!-- Importando jQuery e Materialize JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
    $(document).ready(function(){
    $('.collapsible').collapsible();
    });
    $(document).ready(function(){
                    $('.sidenav').sidenav();
    });
    </script>
</body>
</html>