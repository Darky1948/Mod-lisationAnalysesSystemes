<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1><?php echo $nom_page; ?></h1>
      </div>
      <form action="" method="POST">
          <div class="form-group">
              <label for="taillePopulation">Taille de la population</label>
              <input type="text" class="form-control" id="taillePopulation" name="taillePopulation" value="10000">
          </div>
          <div class="form-group">
              <label for="mu">Mu</label>
              <input type="text" class="form-control" id="mu" name="mu" value="5">
          </div>
          <div class="form-group">
              <label for="lambda">Sigma</label>
              <input type="text" class="form-control" id="sigma" name="sigma" value="1">
              
          </div>
          <div class="form-group">
              <label for="borneMinimale">Borne minimale</label>
              <input type="text" class="form-control" id="borneMinimale" name="borneMinimale" value="0">
          </div>
          <div class="form-group">
              <label for="borneMaximale">Borne maximale</label>
              <input type="text" class="form-control" id="borneMaximale" name="borneMaximale" value="10">
          </div>
          <div class="form-group">
              <label for="nbrClasses">Nombre de classes</label>
              <input type="text" class="form-control" id="nbrClasses" name="nbrClasses" value="10">
              <input type="hidden" id="nomLoi" name="nomLoi" value="normale">
          </div>
          <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
    </div>
</div>

<hr>

<div class="row">
  <div class="col-lg-12">
    <canvas id="myChart" width="400" height="400"></canvas>
    <input type="hidden" id="strClassesEncodePratique" name="strClassesEncodePratique" value="<?php if($afficherResultat){  echo $strClassesEncodePratique; } ?>">
    <input type="hidden" id="strClassesEncodeTheorique" name="strClassesEncodeTheorique" value="<?php if($afficherResultat){  echo $strClassesEncodeTheorique; } ?>">
  </div>
</div>

<script type="text/javascript">
  var tabPratique = document.getElementById('strClassesEncodePratique').value;
  var valeursPratiques = tabPratique.split(" ");
  var tabTheorique = document.getElementById('strClassesEncodeTheorique').value;
  var valeursTheoriques = tabTheorique.split(" ");

  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type : 'bar',
    data : {
      labels : ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
      datasets : [{
        label: 'Valeurs pratiques',
        data: valeursPratiques,
        backgroundColor: "rgba(153,255,51,0.4)"
      }, {
        label: 'Valeurs théoriques',
        data: valeursTheoriques,
        backgroundColor: "rgba(255,153,0,0.4)"
      }]
    }
  });


</script>