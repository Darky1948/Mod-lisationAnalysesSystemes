<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1><?php echo $nom_page; ?></h1>
      </div>
      <form action="" method="POST">
          <div class="form-group">
              <label for="nbrEvenements">Nombre d'évènements</label>
              <input type="text" class="form-control" id="nbrEvenements" name="nbrEvenements" value="100">
          </div>
          <div class="form-group">
              <label for="beta">Bêta</label>
              <input type="text" class="form-control" id="beta" name="beta" value="3" disabled>
          </div>
          <div class="form-group">
              <label for="lambda">Lambda</label>
              <input type="text" class="form-control" id="lambda" name="lambda" value="0.000143">
          </div>
          <div class="form-group">
              <label for="temps">Temps</label>
              <input type="text" class="form-control" id="temps" name="temps" value="11.5">
          </div>
            <div class="form-group">
              <label for="fiabilite">Fiabilité </label>
              <input type="text" class="form-control" id="fiabilite" name="fiabilite">
          </div>
          <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
    </div>
</div>

<hr>

<div id="ordinateurSimulation" class="row">
  <div class="col-xs-4">
    <a href="#" class="thumbnail">
      <img id="ordinateur1" src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div id="progressbar1" class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
  <div class="col-xs-4">
    <a href="#" class="thumbnail">
      <img id="ordinateur2" src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div id="progressbar2" class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
  <div class="col-xs-4">
    <a href="#" class="thumbnail">
      <img id="ordinateur3" src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div id="progressbar3" class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
</div>

<hr>

<div id="resultatSimulation" class="row">
  <div class="col-xs-8 col-md-offset-2">
    <table class="table"> 
      <thead> 
        <tr> 
          <th>Elements</th> 
          <th>Valeurs</th>
        </tr> 
      </thead> 
      <tbody> 
        <tr class="active"> 
          <th scope="row">MTBF en heures</th> 
          <td><?php echo $MTBF; ?></td>
        </tr> 
        <tr> 
          <th scope="row">Fiabilité</th> 
          <td><?php echo $fiabilite; ?></td>
        </tr> 
        <tr class="success"> 
          <th scope="row">Lambda</th> 
          <td><?php echo $lambda; ?></td> 
        </tr> 
        <tr> 
          <th scope="row">Bêta</th> 
          <td><?php echo $beta; ?></td> 
        </tr> 
      </tbody> 
    </table>
  </div>
</div>


<script>

$(document).ready(function() {
  var data;


  var http = new XMLHttpRequest();
  var url = "http://localhost:8098/mathematiques/ws_erreur_ordinateur";
  http.open("POST", url, true);

  //Send the proper header information along with the request
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  http.onreadystatechange = function() {//Call a function when the state changes.
      if(http.readyState == 4 && http.status == 200) {
        data = http.responseText.split(" ");
        var i=0;
        var taille = data.length;
        var timeOutOn;
        var timeOutOff;
        console.log(taille);
          setTimeout(function() {
            if(i<taille){
              console.log(i);
              if(data[i] == 'ordinateur1') {
                afficherErreur($('#progressbar1'), $('ordinateur1'));
                
              }
              if(data[i] == 'ordinateur2') {
                afficherErreur($('#progressbar2'), $('ordinateur2'));
              }
              if(data[i] == 'ordinateur3') {
                afficherErreur($('#progressbar3'), $('ordinateur3'));
              }
              i=i+1;
            }
            
          }, 2000);
          //setTimeout(function() {
           /* if(data[i] == 'ordinateur1') {
              enleverErreur($('#progressbar1'), $('ordinateur1'));
            }
            if(data[i] == 'ordinateur2') {
              enleverErreur($('#progressbar2'), $('ordinateur2'));
            }
            if(data[i] == 'ordinateur3') {
              enleverErreur($('#progressbar3'), $('ordinateur3'));
            }*/
          //}, 3000);
          //sleep(3000);
        
      }
  }
  http.send();
  

  function afficherErreur(progressBar, ordinateur) {
    progressBar.children().removeClass("progress-bar-success").addClass("progress-bar-danger");

    ordinateur.attr("src","http://localhost:8098/mathematiques/vue/images/ordinateur_error.png");
    $('#ordinateurSimulation').append(definirMessageErreur(ordinateur.selector));
  }

  function enleverErreur(progressBar, ordinateur) {
    progressBar.children().removeClass("progress-bar-danger").addClass("progress-bar-success");
    
    ordinateur.attr("src","http://localhost:8098/mathematiques/vue/images/ordinateur_valid.png");
    $('#alert').remove();
  }

  function definirMessageErreur(selector) {
    var contenu = "";
    if(selector == 'ordinateur2') {
      contenu = '<div id="alert" class="col-xs-4 col-md-offset-4"><h1 style="text-align:center;">Erreur du système</h1></div>';
    }else if (selector == 'ordinateur1'){
      contenu = '<div id="alert" class="col-xs-4 col-md-offset-0"><h1 style="text-align:center;">Erreur du système</h1></div>';
    }else{
      contenu = '<div id="alert" class="col-xs-4 col-md-offset-8"><h1 style="text-align:center;">Erreur du système</h1></div>';
    }
    return contenu;
  }

});
</script>