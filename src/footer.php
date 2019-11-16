<?php if (!isset($_SESSION)){
    session_start();
}
?>

<footer>
    <?php 
    include("head.php");

    $accept_cookie = isset($_COOKIE['accept_cookie']);

    if(!$accept_cookie) { ?>
        <div class="cookie-alert">
        Voulez-vous autoriser note site à utiliser des cookies sur votre navigateur ?<br>
        <a href="cookie/deny_cookie">NON</a>
        <a href="cookie/accept_cookie.php">OK</a>
        </div>
    <?php } ?>

    <div class="footer fixed-bottom">
            <a class="footer-icon instaI" href="https://www.instagram.com/"> <i class="fab fa-instagram"></i></a>
            <a class="footer-icon twiI" href="https://twitter.com/" > <i class="fab fa-twitter"></i></a>
            <a class="footer-icon faceI" href="https://facebook.com/" > <i class="fab fa-facebook"></i></a>
            <small><a style="margin-left:20px;" class="text-decoration-none" href="legalnotice.php">Mentions légales</a></small>
    </div>
</footer>
