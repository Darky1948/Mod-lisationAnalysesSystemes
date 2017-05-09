<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1><?php echo $nom_page; ?></h1>
      </div>
      <form action="" method="POST">
          <div class="form-group">
              <label for="taillePopulation">Taille de la population</label>
              <input type="text" class="form-control" id="taillePopulation" name="taillePopulation" value="100">
          </div>
          <div class="form-group">
              <label for="lambda">Lambda</label>
              <input type="text" class="form-control" id="lambda" name="lambda" value="1">
          </div>
          <div class="form-group">
              <label for="t">T</label>
              <input type="text" class="form-control" id="T" name="T" value="5">
          </div>
          <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
    </div>
</div>

<hr>

<div id="resultatSimulation" class="row">
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


<script>

$(document).ready(function() {

  setTimeout(function() {
    $('#progressbar2').children().removeClass("progress-bar-success").addClass("progress-bar-danger");
    
    $("#ordinateur2").attr("src","http://localhost:8098/mathematiques/vue/images/ordinateur_error.png");
    $('#resultatSimulation').append('<div id="alert" class="col-xs-4 col-md-offset-4"><h1 style="text-align:center;">Erreur du système</h1></div>');
  }, 2000);

  setTimeout(function() {
    $('#progressbar2').children().removeClass("progress-bar-danger").addClass("progress-bar-success");
    
    $("#ordinateur2").attr("src","http://localhost:8098/mathematiques/vue/images/ordinateur_valid.png");
    $('#alert').remove();
  }, 3000);
  
});
</script>