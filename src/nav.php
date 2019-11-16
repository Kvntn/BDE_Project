<?php
  if (!isset($_SESSION)){
    session_start();
}
  include("head.php");
?>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php"><i class="fas fa-graduation-cap fa-lg"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Boutique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="event.php">Évènements</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    <?php
      
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
          echo '<li class="nav-item">
                  <a class="nav-link" aria-haspopup="true" aria-expanded="false" href="cart.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
                </li>';
        }
      ?>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user fa-lg"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <?php
                if(!isset($_COOKIE['firstname']))
                    $_COOKIE['firstname'] = 'user';

                if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                    $fname = $_COOKIE['firstname'];
                    echo "
                    <a class=\"dropdown-item\" href=\"profile_edit.php\">Editer le profil</a>
                    <a class=\"dropdown-item\" href=\"disconnect.php\">Déconnexion</a>";
                } 
                
                if(!isset($_SESSION['login'])){
                    $fname = $_COOKIE['firstname'];
                    echo "
                    <a class=\"dropdown-item\" href=\"connexion.php#toregister\">Inscription</a>
                    <a class=\"dropdown-item\" href=\"connexion.php#tologin\">Connexion</a>";
                }
                
                if(@$_SESSION['Statut'] == 1 || @$_SESSION['Statut'] == 2) {
                  echo "
                  <a class=\"dropdown-item\" href=\"add_prod.php\">Ajouter un produit</a>
                  <a class=\"dropdown-item\" href=\"add_event.php\">Ajouter un évènement</a>";
                }
            ?>
        </div>
      </li>

    <?php
      include("search.php");
      include("head.php");
    ?>

    </ul>
    
  </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</nav>
