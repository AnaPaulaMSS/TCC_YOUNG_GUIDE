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
    //os includes puxam os dados dos arquivos no conexao puxam os dados do banco de dados e o admverifica puxa a sessão ja existente criada na hora que foi feito o login
        include('conexao.php');
        include('admverifica.php');
        //da linha 33 a 36 esta sendo feita a verificação da existencia do usuario batendo o registro do banco com a sessão e puxando a foto de perfil do usuario
        $usuario= $_SESSION['email2'];
        $sql = "SELECT * from adm where usuario = '$usuario'";
        $result = mysqli_query($conexao, $sql);
        $row2 = mysqli_fetch_assoc($result);
        $row5 = $row2['id'];
      ?>
        <div class="header">
            <div class="nav">
                <a style="color:white" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
                <div class="logo"><a class="menul" href="admhome.php"> <h3>Young Guide</h3> </a></div>
                <div class="perfilnav">
                    <h5><?php echo $_SESSION['email2'];?>
                        <br/> <a class="menul" href="admlogout.php">sair </a>
                    </h5> 
                    <img   class="circle responsive-img" src="imagens/ADM.png">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="postagem">
                <div class="postaagem">
                <?php 
                    $valor = $_GET['parametro'];
                    $valor1 = $_GET['parametro1'];
                    $_SESSION['valor'] = $valor;
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
                            <img src="imagens/ADM.png" alt="" class="circle responsive-img" margin-top="10px">
                            <p class="usu"><?php echo $_SESSION['email2'];?></p>
                            </div>
                            <form method="POST" action="adminsertcoment.php">
                                <div class="conteudo">
                                        <textarea name="conteudo2" placeholder="Insira seu comentário aqui"></textarea>
                                        
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
                $sql1 = "SELECT c.id as c, c.comentario as comentario, c.post_id, c.esp_id, e.id as a, e.usuario, p.id as p
                FROM comentarios c
                INNER JOIN postagens p ON c.post_id = p.id
                INNER JOIN especialista e ON c.esp_id = e.id
                WHERE c.post_id = $valor";
        $result = mysqli_query($conexao, $sql1);
      
               while ($row7=$result->fetch_assoc()){
                  echo" 
                  <div class='coment'>
                        <div class='imagem-coment'>
                        <img src='imagens/perfil.png' alt='' class='circle responsive-img' margin-top='10px'>
                            <p class'usu'>".$row7['usuario']."</p>
                        </div>
                        <div class='conteudo'>
                            <p>".$row7['comentario']."</p>
                        </div>
                    </div><br/>"
           ;}
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
        </div>

</body>

  <!-- Navbar -->
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="imagens/office.jpg">
      </div>
      <div href="#user">
        <img  class="circle responsive-img" src="imagens/ADM.png">
          <p><?php echo $_SESSION['email2'];?></p>
      </div>
    </div></li>

    <li><a href="admconfig.php"><i class="material-icons">settings</i>Configurações de usuário</a></li>
    <li><a href="https://forms.gle/dEkkgYonZGgsygMT9" target="_blank">Questionário</a></li>

    <li><div class="divider"></div></li>

    <li><a class="subheader">Ferramentas</a></li>

    <li><a class="waves-effect" href="admhome.php"><span class="material-icons">home</span>&nbsp&nbspPágina Principal</a></li>
            <li><a class="waves-effect" href="admguias.php"><span class="material-icons">menu_book</span>&nbsp&nbspGuias</a></li>
            <li><a class="waves-effect" href="admquestionario.php"><span class="material-icons">equalizer</span>&nbsp&nbspDados do questionário</a></li>
            <li><a class="waves-effect" href="admesp.php"><span class="material-icons">emoji_people</span>&nbsp&nbspPedidos para especialista</a></li>
            <li><a class="waves-effect" href="administradorsug.php"><span class="material-icons">done</span>&nbsp&nbspVeirificar sugestões</a></li>
            <li><a class="waves-effect" href="admsugestoesaprov.php"><span class="material-icons">assignment</span>&nbsp&nbspVer sugestões</a></li>
            <li><a class="waves-effect" href="admlix.php"><span class="material-icons">delete_outline</span>&nbsp&nbspLixeira</a></li>
            <li><a class="waves-effect" href="admsobre.php">&nbsp&nbspSobre nós</a></li>
            <li><a class="waves-effect" href="admlogout.php"><span class="material-icons">logout</span>&nbsp&nbspSair da conta</a></li>
  </ul>

  <!-- Importando jQuery e Materialize JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
  </script>
</html>