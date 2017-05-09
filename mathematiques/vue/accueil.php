<div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1><?php echo $nom_page; ?></h1>
      </div>
      <form>
          <div class="form-group">
              <label for="nom">Parametres</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
          </div>
          <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
          </div>
          <div class="form-group">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
          </div>
          <button type="submit" class="btn btn-primary">Calculer</button>
      </form>
    </div>
</div>
