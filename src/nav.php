<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">BDE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbars">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Boutique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="event.php">Event</a>
      </li>
    
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
      <div class="dropdown-menu" aria-labelledby="dropdown01">
        <?php
            if(!isset($_COOKIE['firstname']))
                $_COOKIE['firstname'] = 'user';

            if(isset($_SESSION['login'])){
                $fname = $_COOKIE['firstname'];
                echo "
                <a class=\"dropdown-item\" href=\"profile_edit.php\">Editer le profil</a>
                <a class=\"dropdown-item\" href=\"disconnect.php\">Deconnection</a>";
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

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


</nav>


    
