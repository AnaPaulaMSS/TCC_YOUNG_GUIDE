<?php
session_start();

if (!$_SESSION['email3']) {
    header('location:eshome.php');
    exit();
}
?>