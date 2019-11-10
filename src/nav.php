<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">BDE Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="connexion.php#toregister">Inscription<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="connexion.php#toconnection">Connexion</a>
            </li>

            <?php 
            if(isset($_SESSION['email'])){
                echo "
                <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"disconnect.php\">Deconnection</a>
                </li>";
                var_dump($_SESSION);
            } 
            ?>
            <li class="nav-item">
            <a class="nav-link" href="shop.php#toconnection">Boutique</a>
            </li>
            </ul>
            
        </div>
</nav>