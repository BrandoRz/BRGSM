<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-user"></i> Fournisseurs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a><?php echo $user['nom']." ".$user['prenom']; ?></a></li>
          </ol>
        </div>
      </div>
    </div>
    <hr>
</div>

  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="card-title">Liste des fournisseurs</h3>
              <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#ajouterFournisseurModal">Ajouter</button>
            </div>      
            <div class="card-body">
              <div class="form-group">
                <input type="text" placeholder="Recherche Fournisseur" class="form-control" onchange="GetListFournisseurSearch(this.value)">
              </div>
              <hr>
              <div class="row" id="listFournisseur"></div>
            </div>      
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal Ajouter Fournisseur -->
  <div class="modal fade" id="ajouterFournisseurModal" tabindex="-1" role="dialog" aria-labelledby="ajouterFournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterFournisseurModalLabel">Ajouter Fournisseur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ajouterFournisseurForm">
            <div class="form-group">
              <label for="nomFournisseur">Nom</label>
              <input type="text" class="form-control" id="nomFournisseur" name="nomFournisseur" required>
            </div>
            <div class="form-group">
              <label for="adresseFournisseur">Adresse</label>
              <input type="text" class="form-control" id="adresseFournisseur" name="adresseFournisseur" required>
            </div>
            <div class="form-group">
              <label for="contactFournisseur">Contact</label>
              <input type="text" class="form-control" id="contactFournisseur" name="contactFournisseur" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          </form>
        </div>
      </div>
    </div>
  </div>

 