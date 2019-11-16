<?php

session_start();
setcookie('email',$_SESSION['Email'], time() + 365*24*3600, "/", null, false, true);
setcookie('pw',$_SESSION['unhashed'], time() + 365*24*3600, "/", null, false, true);
setcookie('accept_cookie', true, time() + 365*24*3600, "/", null, false, true);
header("Location: ../index.php");
?>