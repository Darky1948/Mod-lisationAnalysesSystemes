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

<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h3>Résultats : </h3>
      </div>
      <div>
        <?php
          if($afficherResultat) {
            echo '
                <p>Lamba : ' . $lambda . ' </p>
                <p>T : ' . $T . '</p>
                <p>Mu : ' . $mu . ' (théorique) - ' . $moyennePratiqueT .' (pratique). Marge erreur : ' . $margeErreurT . '%</p>' .
                '<p> Moyenne écart théorique : ' .  $moyenneTheorique . '</p>' .
                '<p> Moyenne écart pratique : ' . $moyennePratique . '</p>' .
                '<p> Marge erreur : ' . $margeErreur . '%</p>';
          }
        ?>
      </div>  
    </div>
</div>

<iframe width="1150px" src="<?php echo ADRESSE_ABSOLUE_URL . 'ws_processus_poisson'; ?>" style="border:none; height:300px; overflow-x: hidden; overflow-y: scroll"></iframe>