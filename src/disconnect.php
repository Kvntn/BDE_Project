<?php
    include "head.php";
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['motDePasse']);
    session_destroy();
    header('Location: index.php');
?>