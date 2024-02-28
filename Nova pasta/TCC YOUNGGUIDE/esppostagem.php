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
    <link href="css/postagem.css" rel="stylesheet">
    <title>Postagem</title>
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
        <div class="perfilnav">
                    <h5><?php echo $_SESSION['email3'];?>
                        <br/> <a href="logout.php">sair </a>
                    </h5> 
                    <img  class="circle responsive-img" src="<?php echo $arquivos['PATH'];?>">
        </div>
    </div>
</div>
        
    <div class="container">
        <div class="postagem">
                <div class="postaagem">
                    <?php 
                    $valor = $_GET['parametro'];
                    $valor1 = $_GET['parametro1'];
                    $sql = "SELECT * from especialista where id = '$valor1'";
                    $result = mysqli_query($conexao, $sql);
                    $row = mysqli_fetch_assoc($result);
                    //não esqueça de declarar as chaves estrangeiras

                    $sql =  mysqli_query($conexao, "SELECT *from postagens where id = '$valor'");
                    $lin= $sql->fetch_assoc();
                            
                    // Valor dinâmico que você deseja inserir no URL
                    $sql =  mysqli_query($conexao, "SELECT *from fotos where id_esp = '$valor1'");
                    $linha= $sql->fetch_assoc();
                    ?>
                        <div class="topo">
                        <img src="imagens/book.png" alt="" width="20%"> <h1><?php echo $lin['titulo']?></h1>
                        <div class="icones">

                            <!-- AQUI ESTA A DE CURTIDAS E FAVORITOS, ESTOU TENTANDO PASSAR AS ID'S ASSIM COMO VC ESTAVA PASSANDO OS PARAMETROS -->
                            <button onclick="executarScriptPHP()" id="curtir"><span class="material-icons md-48">favorite_border</span></button>
                            <script>
                                function executarScriptPHP() {
                                    // Obtém as variáveis PHP
                                    var post_id = "<?php echo  $valor; ?>";
                                    var user_id = "<?php echo $row1; ?>";
                                    // Faz uma requisição para o arquivo PHP com os parâmetros na URL
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            console.log(this.responseText);
                                            alert(this.responseText);
                                        }
                                    };
                                    xhttp.open("GET", "espcurtida.php?post_id=" + post_id + "&user_id=" + user_id, true);
                                    xhttp.send();
                                }
                            </script>
                            <button onclick="executarScriptPHP2()" id="salva"><span class="material-icons md-48">bookmark_border</span></button>
                            <script>
                                function executarScriptPHP2() {
                                    // Obtém as variáveis PHP
                                    var post_id = "<?php echo $valor; ?>";
                                    var user_id = "<?php echo $row1; ?>";
                                    // Faz uma requisição para o arquivo PHP com os parâmetros na URL
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            console.log(this.responseText);
                                            alert(this.responseText);
                                        }
                                    };
                                    xhttp.open("GET", "espsalva.php?post_id=" + post_id + "&user_id=" + user_id, true);
                                    xhttp.send();
                                }
                            </script>
                            
                        </div>
                        </div>
                        <div class="blog"><?php echo $lin['conteudo']?></div>
                        <div class="pe">
                            
                            <div class="foto center-align">
                                <img src="<?php echo $linha['PATH']?>" alt="" class="circle responsive-img" width="100%">
                            </div>
                            <div class="perfil center-align">
                            <h1><?php echo $row['usuario'];?></h1>
                            <h5>Especialista | Profissão</h5>
                            </div>
                        
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
                    <form method="POST" action="espinsertcoment.php">
                        <div class="conteudo">
                                <textarea name="conteudo" placeholder="Insira seu comentário aqui"></textarea>
                                   
                        </div>
                        <input class="enviar" type="submit" value="enviar"/>
                    </form>
                </div>

                    <?php //não esqueça de declarar as chaves estrangeiras
                        $sql = "SELECT c.id as c, c.comentario as comentario, c.post_id, c.adm_id, a.id as a, a.usuario, p.id as p
                        FROM comentarios c
                        INNER JOIN postagens p ON c.post_id = p.id
                        INNER JOIN adm a ON c.adm_id = a.id
                        WHERE c.post_id = $valor";
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
                       $sql1 = "SELECT c.id as c, c.comentario as comentario, c.post_id, c.esp_id, e.id as e, e.usuario, f.PATH as foto,
                        p.id as p
                        FROM comentarios c
                        INNER JOIN postagens p ON c.post_id = p.id
                        INNER JOIN especialista e ON c.esp_id = e.id
                        LEFT JOIN fotos f ON f.id_esp = e.id
                        WHERE c.post_id = $valor";
                
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
                        $sql2 = "SELECT c.id as c, c.comentario as comentario, c.post_id, c.user_id, u.id as a, u.usuario, p.id as p
                                FROM comentarios c
                                INNER JOIN postagens p ON c.post_id = p.id
                                INNER JOIN usuario u ON c.user_id = u.id
                                WHERE c.post_id = $valor";
                            $result = mysqli_query($conexao, $sql2);
                    
                            while ($row6=$result->fetch_assoc()){
                                echo" 
                                <div class='coment'>
                                    <div class='imagem-coment'>
                                    <img src='imagens/perfil.png' alt='' class='circle responsive-img' margin-top='10px'>
                                        <p class'usu'>".$row6['usuario']."</p>
                                    </div>
                                        <div class='conteudo'>
                                            <p>".$row6['comentario']."</p>
                                        </div>
                                </div><br/>"
                        ;}
                    ?>  
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

  <!-- Importando jQuery e Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
  </script>
  </body>
</html>