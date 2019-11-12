<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php">BDE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Boutique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.php">Event</a>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <?php 

                if(!isset($_COOKIE['firstname']))
                    $_COOKIE['firstname'] = 'user';

                if(isset($_SESSION['login'])){
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
                
                if(!isset($_SESSION['login'])){
                    $fname = $_COOKIE['firstname'];
                    echo "
                    <a class=\"nav-link\" href=\"connexion.php#toregister\">Inscription</a>
                    <a class=\"nav-link\" href=\"connexion.php#tologin\">Connexion</a>";
                }
            ?>
        </ul>
      </div>
    </nav>
