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
  <div id="ordinateur1Valid" class="col-xs-4">
    <a href="#" class="thumbnail">
      <img src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
  <div id="ordinateur1Error" class="col-xs-4" style="display:none;">
    <a href="#" class="thumbnail">
      <img src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_error.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div class="progress">
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
    <div id="alert1"><h3 style="text-align:center;">Erreur du système</h3></div>
  </div>
  <div id="ordinateur2Valid" class="col-xs-4">
    <a href="#" class="thumbnail">
      <img src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
  <div id="ordinateur2Error" class="col-xs-4" style="display:none;">
    <a href="#" class="thumbnail">
      <img id="ordinateur2" src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_error.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div id="progressbar2" class="progress">
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
    <div id="alert2"><h3 style="text-align:center;">Erreur du système</h3></div>
  </div>
  <div id="ordinateur3Valid" class="col-xs-4">
    <a href="#" class="thumbnail">
      <img src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_valid.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
  </div>
  <div id="ordinateur3Error" class="col-xs-4" style="display:none;">
    <a href="#" class="thumbnail">
      <img src="<?php echo ADRESSE_ABSOLUE_URL . 'vue/images/ordinateur_error.png'; ?>" class="img-responsive img-rounded" alt="Cinque Terre" style="width:204px;height:auto;">
    </a>
    <div class="progress">
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
    </div>
    <div id="alert3"><h3 style="text-align:center;">Erreur du système</h3></div>
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
        <tr class="info"> 
          <th scope="row">MTBF calculé en heures</th> 
          <td><?php if(isset($MTBF)){ echo $MTBF; } ?></td>
        </tr> 
        <tr class="">
          <th scope="row">MTBF mesuré en heures</th> 
          <td><?php if(isset($MTBFPratique)){ echo $MTBFPratique; } ?></td>
        </tr>
        <tr class="info">
          <th scope="row">Marge d'erreur entre MTBF calculé et mesuré</th> 
          <td><?php if(isset($margeErreur)){ echo ($margeErreur*100) . ' %'; } ?></td>
        </tr>
        <tr> 
          <th scope="row">Fiabilité</th> 
          <td><?php if(isset($fiabilite)){ echo $fiabilite; } ?></td>
        </tr> 
        <tr class="info"> 
          <th scope="row">Lambda</th> 
          <td><?php if(isset($lambda)){ echo $lambda; } ?></td> 
        </tr> 
        <tr> 
          <th scope="row">Bêta</th> 
          <td><?php if(isset($beta)){ echo $beta; }?></td> 
        </tr> 
      </tbody> 
    </table>
  </div>
</div>

<hr>

<div id="valeursErreurs"> 
</div>
<br />

<iframe width="1150px" src="<?php echo ADRESSE_ABSOLUE_URL . 'ws_graphe_simulation'; ?>" style="border:none; height:300px; overflow-x: hidden; overflow-y: scroll"></iframe>  


<script>

$(document).ready(function() {
  var data;
  var i=0;
  var taille;
  var times;

  var http = new XMLHttpRequest();
  var url = "http://localhost:8098/mathematiques/ws_erreur_ordinateur";
  http.open("POST", url, false);

  //Send the proper header information along with the request
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  http.onreadystatechange = function() {//Call a function when the state changes.
      if(http.readyState == 4 && http.status == 200) {
        data = http.responseText.split(" ");        
        taille = data.length;
      }
  }
  http.send();

  times = getTimeOrdinateur();

  timeout();
;
  function timeout() {
    setTimeout(function () {
      if(data != ""){
        $('#ordinateur1Valid').toggle();
        $('#ordinateur1Error').toggle();
        $('#ordinateur2Valid').toggle();
        $('#ordinateur2Error').toggle();
        $('#ordinateur3Valid').toggle();
        $('#ordinateur3Error').toggle();
        $('#valeursErreurs').empty();

        if(i<taille){
          if(data[i] == 'ordinateur1') {
            $('#ordinateur1Valid').toggle();
            $('#ordinateur1Error').toggle();
            $('#valeursErreurs').append('Valeurs erreurs ' + times[i]);
          }
          if(data[i] == 'ordinateur2') {
            $('#ordinateur2Valid').toggle();
            $('#ordinateur2Error').toggle();
            $('#valeursErreurs').append('Valeurs erreurs ' + times[i]);
          }
          if(data[i] == 'ordinateur3'){
            $('#ordinateur3Valid').toggle();
            $('#ordinateur3Error').toggle();
            $('#valeursErreurs').append('Valeurs erreurs ' + times[i]);
          }
          console.log(data[i]);
        }   
        i++;
        timeout();
      }
    }, 1000);
  }

  function getTimeOrdinateur(){
    var http = new XMLHttpRequest();
    var url = "http://localhost:8098/mathematiques/ws_get_time_ordinateur";
    var values;
    var params = "valeur=1";

    http.open("POST", url, false);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
          values = http.responseText.split(" ");        
        }
    }
    http.send(params);
    return values;
  }

});
</script>