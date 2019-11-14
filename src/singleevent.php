<?php  
    session_start();
    include("head.php");
    include("nav.php");
    include("footer.php");
?>

<div class="container-singleevent">

  <div class="card text-center">
    <div class="card-header bg-dark">

      <ul class="nav nav-tabs card-header-tabs">

        <li class="nav-item">
          <a class="nav-link active" href="#p1" data-toggle="tab">Evénement</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p2" data-toggle="tab">Commentaire</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p3" data-toggle="tab">Photo de l'événement</a>
        </li>

      </ul>

    </div>

  <div class="tab-content">

      <div class="card-body tab-pane active" id="p1">
        <h5 class="card-title">Week-End d'intégration <small class="text-right">Payant</small></h5>
        <p class="card-text texte-left">Venez profiter d'un merveilleux weekend en compagnie de vos futur colègues.<p class="text-right"><input class="btn btn-outline-warning" type="submit" value="Intéressé"></p>
      </div>

      <div class="tab-pane" id="p2">

        <div class="list-group-item list-group-item flex-column align-items-start text-left">
          <div class="inline"> 
          <h4><img class="text-right" src="./resources/images/Photo_Profil/thomas.lima@viacesi.fr.jpg" style="max-width: 20px; height:20px;" alt="">      Thomas Lima</h4>
          </div>
          <p>Wow super weekend, surtout quand on peu pas y aller psq on est en deuxieme année</p>
        </div>

        <div class="list-group-item list-group-item flex-column align-items-start text-left">
          <div class="inline"> 
          <h4><img class="text-right" src="./resources/images/Photo_Profil/thomas.lima@viacesi.fr.jpg" style="max-width: 20px; height:20px;" alt="">      SOOOOOOOJA</h4>
          </div>
          <p>Wow super weekend, surtout quand on peu pas y aller psq on est en deuxieme année</p>
        </div>

      </div>

      <div class="card-body tab-pane" id="p3">
       
      <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"></button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            

      </div>

  </div>

  </div>

</div>