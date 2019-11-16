<?php

session_start();
setcookie('accept_cookie', true, time() + 365*24*3600, "/", null, false, true);
header("Location: ../index.php");
?>