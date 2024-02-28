<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="css/perfil.css" rel="stylesheet">
    <script src="js/slider.js" defer></script>
    <title>Perfil</title>
    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
        <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
</head>
<body>
<?php
        include('conexao.php');
        include('esverifica.php');
        $usuario=$_SESSION['email3'];
        $valor = $_GET['parametro'];
        $_SESSION['valor8'] = $valor;
        //não esqueça de declarar as chaves estrangeiras
        $sql = "SELECT * from especialista where usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);
        $row1 = $row['id'];
        $sql = "SELECT * from especialista where id = '$valor'";
        $result = mysqli_query($conexao, $sql);
        $row7 = mysqli_fetch_assoc($result);
        $_SESSION['valor9'] = $row1; 
        $sql= mysqli_query($conexao,"SELECT * FROM fotos where id_esp ='$row1'") or die ($mysqli->error);
        $arquivos= $sql->fetch_assoc();
        $sql= mysqli_query($conexao,"SELECT * FROM fotos where id_esp ='$valor'") or die ($mysqli->error);
        $arquivos1= $sql->fetch_assoc();
      ?>
        <div class="header">
            <div class="nav">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a href="eshome.php"><h3>Young Guide</h3></a></div>
                <div class="perfilm">
                    <h5><?php echo $_SESSION['email3'];?>
                        <br/> <a href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
                </div>
            </div>
        </div>

    <div class="container">
            <div class="foto center-align">
                <div class="imagem">
                    <img src="<?php echo $arquivos1['PATH'];?>" alt="" class="circle responsive-img" width="80%">
                </div>
            </div>
            <div class="perfil center-align">
                <div class="textoperfil">
                    <h1><?php echo $row['usuario']?></h1>
                    <h4>Especialista | Profissão</h4>
                </div>
            </div>
            <div class="postagem">
              <div class="guides">
                  <img src="imagens/book.png" style="height: 20vh;">
                  <h1>Guides</h1>
              </div>
              <div class="post">
                  <div class="wrapper">
                      <i id="left" class="fa-solid fa-angle-left"><</i>
                      <ul class="carosel">
                      <?php $sqli = "SELECT e.id as e, e.usuario, p.titulo, p.id as p
                            FROM especialista e
                            INNER JOIN postagens p
                            WHERE e.id = $valor and p.id_esp = e.id";
                            $resulta = mysqli_query($conexao, $sqli);
                            
                            // Valor dinâmico que você deseja inserir no URL                                   
                            while ($lin=$resulta->fetch_assoc()){
                                $parametro= $lin ['p'];
                                $parametro1 = $lin['e'];
                                // Use o PHP para gerar o URL com base no valor dinâmico

                                $url = "esppostagem.php?parametro=" . urlencode($parametro) . "&parametro1=" . urlencode($parametro1);
                                //$url = "postagem.php?parametro=" . $parametro;
                                //echo $parametro."<br>".$url."<br>";
                                echo"
                                
                                <li class='card'>
                                    <a href='$url'>
                                        <span>".$lin['titulo']."</span><br>
                                        <span>".$lin['usuario']."</span>
                                    </a>
                                </li>"
                        ;}
                    ?>
                      
                     
                      </ul>
                      <i id="right" class="fa-solid fa-angle-right">></i>
                  </div>
              </div>
          </div>
          <div class="comenta">
            <div class="fundo">
                <h1 class="center-align">Comentários</h1>

                <div class="coment">
                    <div class="imagem-coment">
                    <img src="<?php echo $arquivos['PATH'];?>" alt="" class="circle responsive-img" margin-top="10px">
                    <p class="usu"><?php echo $_SESSION['email3'];?></p>
                    </div>
                    <form method="POST" action="espinsertchat.php">
                        <div class="conteudo">
                                <textarea name="conteudo4" placeholder="Insira seu comentário aqui"></textarea>
                        </div>
                        <input class="enviar" type="submit" value="enviar"/>
                    </form>
                </div>

                <?php //não esqueça de declarar as chaves estrangeiras
                                $sql = "SELECT c.id as c, c.comentario as comentario, c.perfil_id, c.adm_id, a.id as a, a.usuario, e.id
                                FROM chat c
                                inner join especialista e on c.perfil_id = e.id
                                INNER JOIN adm a ON c.adm_id = a.id
                                WHERE c.perfil_id = $valor";
                                $result = mysqli_query($conexao, $sql);
                    
                                while ($row4=$result->fetch_assoc()){
                                    echo" 
                                    <div class='coment'>
                                     <div class='imagem-coment'>
                                     <img src='imagens/ADM.png' alt='' class='circle responsive-img' margin-top='10px'>
                                         <p class'usu'>".$row4['usuario']."</p>
                                     </div>
                                     <div class='conteudo'>
                                         <p>".$row4['comentario']."</p>
                                     </div>
                                   </div><br/>"
                             ;}
                                $sql1 = "SELECT c.id as c, c.comentario as comentario, c.perfil_id, c.esp_id, e.id as e, e.usuario, f.PATH as foto
                                FROM chat c
                                INNER JOIN especialista e ON c.esp_id = e.id
                                LEFT JOIN fotos f ON f.id_esp = e.id
                                WHERE c.perfil_id = $valor";
                        
                                $result = mysqli_query($conexao, $sql1);
                        
                                while ($row2 = $result->fetch_assoc()) {
                                    echo "
                                    <div class='coment'>
                                        <div class='imagem-coment'>
                                        <img src='imagens/perfil.png' alt='' class='circle responsive-img' margin-top='10px'>
                                            <p class='usu'>" . $row2['usuario'] . "</p>
                                        </div>
                                        <div class='conteudo'>
                                            <p>" . $row2['comentario'] . "</p>
                                        </div>
                                   </div><br/>";
                                }

                                $sql2 = "SELECT c.id as c, c.comentario as comentario, c.perfil_id, c.user_id, u.id as u, u.usuario, f.PATH as foto
                                FROM chat c
                                INNER JOIN usuario u ON c.user_id = u.id
                                INNER JOIN fotos f ON u.id = f.id_usu
                                WHERE c.perfil_id = $valor";
                                $result = mysqli_query($conexao, $sql2);
                    
                                while ($row4=$result->fetch_assoc()){
                                    echo" 
                                    <div class='coment'>
                                        <div class='imagem-coment'>
                                            <img src='imagens/perfil.png' alt='' class='circle responsive-img' margin-top='10px'>
                                            <p class'usu'>".$row4['usuario']."</p>
                                        </div>
                                        <div class='conteudo'>
                                            <p>".$row4['comentario']."</p>
                                        </div>
                                    </div><br/>";
                            }
                    ?>  
                    
                </div>
            </div>
        </div>

    </div>


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
    </script>
                <script>
            window.sr = ScrollReveal({ reset: true });
            sr.reveal('.imagem', { 
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.textoperfil', { 
                distance: '100px',
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.guides', { 
                distance: '20px',
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             sr.reveal('.post', { 
                rotate: { x:0, y:80, z:0 },
                duration: 2300
             });
             
             sr.reveal('.coment', { 
                distance: '100px',
                rotate: { x:0, y:0, z:0 },
                duration: 2300
             });
        </script>
</body>
</html>