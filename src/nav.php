
<nav class="mb-1 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">B.D.E.</a>
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
        <a class="nav-link" href="event.php">Event</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <?php
                if(!isset($_COOKIE['firstname']))
                    $_COOKIE['firstname'] = 'user';

                if(isset($_SESSION['login'])){
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
            ?>
        </div>
      </li>
    </ul>

    <div class="autocomplete">
       <form class="form-inline my-2 my-lg-0" autocomplete="off" action="/action_page.php">
           <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" id="myInput" type="text" name="myCountry">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
       </form>
    </div>
    
  </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="resources/js/autocomplete/autocomplete-0.3.0.js"></script>
<script src="resources/js/javascript.js"></script>
</nav>
