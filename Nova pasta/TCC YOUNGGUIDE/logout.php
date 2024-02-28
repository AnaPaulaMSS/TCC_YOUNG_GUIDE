<?php
session_start();
/*unset($_SESSION['nomedasessão'])usado para destruir um sessão em especifico*/
header('location:index.html');
session_destroy();

exit();
?>