<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@800&family=Questrial&display=swap');
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="css/admesp.css" rel="stylesheet">
    <title>Verificar sugestões</title>
    <link rel="icon" href="imagens/logoa.png" type="imagens/logoa.png">
    <link rel="shortcut icon" href="imagens/logoa.png" type="imagens/logoa.png">
</head>
<body>
    <?php
        include('conexao.php');
        include('admverifica.php');
        $usuario= $_SESSION['email2'];
    ?>
        <div class="header">
            <div class="nav">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
            </div>
        </div>
        <div class="container">
            <h1>Ferramentas de Administrador</h1>
            <h4>Pedidos para especialista</h4>
            <div class="sugestoes">
               
                <?php //não esqueça de declarar as chaves estrangeiras
                      $sqli = "SELECT c.nome_completo as n, c.idade as i, c.email as e, c.profissao as p, c.PATH as cpt, f.PATH as fph, u. usuario as u, u.id as id, c.resultado
                      FROM curriculo c
                      INNER JOIN fotos f
                      INNER JOIN usuario u
                      WHERE c.resultado = 's'";
                    $resultado = mysqli_query($conexao, $sqli);
           
                    while ($row4=$resultado->fetch_assoc()){
                        echo "
                        <div class='fundo'>
                            <div class='perfil'>
                                <img src='".$row4['fph']."' alt='' class='circle responsive-img'>
                                <h3>".$row4['u']."</h3>
                            </div> <br/>
                            <div class='mensagem'>
                                <div class='info'>
                                    <ul>
                                        <li class='infoli'>
                                            <p class='lit'>Nome Completo:</p>
                                            <span class='infospan'>".$row4['n']."</span> 
                                        </li>
                                        <li class='infoli'>
                                            <p class='lit'>Idade:</p>
                                            <span class='infospan'>".$row4['i']."</span> 
                                        </li>
                                        <li class='infoli'>
                                            <p class='lit'>Email:</p>
                                            <span class='infospan'>".$row4['e']."</span> 
                                        </li>
                                        <li class='infoli'>
                                            <p class='lit'>Profissão:</p>
                                            <span class='infospan'>".$row4['p']."</span> 
                                        </li><br/>
                                        <li>
                                            <a class='curriculo' href='imagens/pdfexemplo.pdf' target='_blank'>Currículo</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class='botoes'>
                                    <form method='post' action='logadmesp.php'>
                                        <label>
                                            <input name='group1' type='radio' id='op' checked value='M'/>
                                            <span>Aprovar</span>
                                        </label>
                                        <label>
                                            <input name='group1' type='radio' id='op' checked value='n'/>
                                            <span>Recusar</span>
                                        </label>
                                        </br>
                                        <input type='submit' name='enviar' class='enviar'>
                                    </form>
                                </div>
                            </div>
                        </div>";
                ;}?>
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

    </body>
</html>