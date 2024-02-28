<?php
session_start();

if (!$_SESSION['email2']) {
    header('location:admhome.php');
    exit();
}
?>