<?php
session_start();
/*unset($_SESSION['nomedasessão'])usado para destruir um sessão em especifico*/
//o codigo ele faz a função de destruir a sessão quando o usuario decidir deslogar do site 
header('location:index.html');
session_destroy();

exit();



?>