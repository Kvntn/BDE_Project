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

        <li class="nav-item">
        <a class="nav-link" href="shop.php#toconnection">Boutique</a>
        </li>

        <?php 
        if(isset($_SESSION['email'])){
            $fname = $_COOKIE['firstname'];
            echo "
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"profile_edit.php\">Editer le profil</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"disconnect.php\">Deconnection</a></li>";

            //TODO: DROPDOWN MENU FOR ACCOUNT AND SESSION MANAGEMENT
            /*echo "
            <div class=\"dropdown\">
                <button class=\"btn btn-primary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">Bonjour, $fname
                <span class=\"caret\"></span></button>
                <ul class=\"dropdown-menu\">
                    <li><a class=\"dropdown-item\" href=\"profile_edit.php\">Editer le profil</a></li>
                    <li><a class=\"dropdown-item\" href=\"disconnect.php\">Deconnection</a></li>
                </ul>
            </div>";*/
        } 
        ?>
        </ul>
    </div>
</nav>

