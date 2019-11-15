<?php
    include "head.php";
    unset($_SESSION['email']);
    unset($_SESSION['motDePasse']);
    session_destroy();
    header('Location: index.php');
?>