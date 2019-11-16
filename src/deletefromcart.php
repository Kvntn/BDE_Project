<?php
     if (!isset($_SESSION)){
    session_start();
}
    include("head.php");
    include("nav.php");
    include("footer.php");

    unset($_SESSION['cart'][$_GET['key']]);

    echo '<script>document.location.replace("./cart.php")</script>';
?>