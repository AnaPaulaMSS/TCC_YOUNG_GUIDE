<?php
session_start();

if (!$_SESSION['email1']) {
    header('location:home.php');
    exit();
}
?>