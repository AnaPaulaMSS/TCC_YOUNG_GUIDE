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
    <link href="css/admsug.css" rel="stylesheet">
    <title>Verificar sugestões</title>
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
        $sql= mysqli_query($conexao,"SELECT * FROM fotos where id_usu ='$usuario'") or die ($mysqli->error);
        $arquivos= $sql->fetch_assoc();
      ?>
        <div class="header">
            <div class="nav">
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons md-48">menu</i></a>
            </div>
        </div>
  <div class="container">
      <h1>Ferramentas de Administrador</h1>
      <h4>Verificar sugestões</h4>
    <div class="sugestoes">
    <?php
      // da linha 39 a 86 o codigo esta fazendo o processo para exibir as postagens
         $sql = "SELECT * from usuario";
         $result = mysqli_query($conexao, $sql);
         $row = mysqli_fetch_assoc($result);
         $row1 = $row['id'];
         if ($row1 > 0) {
          //não esqueça de declarar as chaves estrangeiras
           $sqli = "SELECT e.id, e.usuario, f.PATH, a.titulo, a.conteudo, a.permissao
           FROM especialista e
           INNER JOIN fotos f
           INNER JOIN artigos a
           WHERE a.id_esp = e.id AND f.id_esp = e.id and a.permissao = 's' ";
         $resultado = mysqli_query($conexao, $sqli);
         
         while ($lin1=$resultado->fetch_assoc()){
          $_SESSION['valorEspecifico'] = $lin1['titulo'];
          $_SESSION['valorEspecifico1'] = $lin1['conteudo'];
           echo "
             <div class='fundo'>
                 <div class='perfil'>
                   <img src='" .$lin1['PATH'] ."' alt='' class='circle responsive-img'>
                 </div>
                 <div class='usuario'>
                   <h5> ".$lin1['usuario']."</h5>
                 </div>
                 <div class='mensagem'>
                   <div class='titulo'>" . $lin1['titulo']. "</div>
                   <div class='conteudo'>" . $lin1['conteudo']. "</div>
                 </div>
        
                 <div class='botoes'>
                   <form method='post' action='apr_e_recu.php'>
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
             </div>";
         }
                   $sqli = "SELECT u.id, u.usuario, f.PATH, a.titulo, a.conteudo, a.permissao
                   FROM usuario u
                   INNER JOIN fotos f
                   INNER JOIN artigos a
                   WHERE a.id_usu = u.id AND f.id_usu = u.id and a.permissao = 's' ";
                 $resulta = mysqli_query($conexao, $sqli);
                 
                 
              
              while ($lin=$resulta->fetch_assoc()){
                $_SESSION['valorEspecifico2'] = $lin['titulo'];
                $_SESSION['valorEspecifico3'] = $lin['conteudo']; 
               
                echo "
                  <div class='fundo'>
                      <div class='perfil'>
                        <img src='" .$lin['PATH'] ."' alt='' class='circle responsive-img'>
                      </div>
                      <div class='usuario'>
                        <h5> ".$lin['usuario']."</h5>
                      </div>
                      <div class='mensagem'>
                        <div class='titulo'>" . $lin['titulo']. "</div>
                        <div class='conteudo'>" . $lin['conteudo']. "</div>
                      </div>
        
                      <div class='botoes'>
                        <form method='post' action='apr_e_recu.php'>
                            <label>
                              <input name='group2' type='radio' id='op1' checked value='M'/>
                              <span>Aprovar</span>
                            </label>
                            <label>
                              <input name='group2' type='radio' id='op1' checked value='n'/>
                              <span>Recusar</span>
                            </label>
                          </br>
                          <input type='submit' name='enviar' class='enviar'>
                        </form>
                      </div>
                  </div>";
              }}
    ?>
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