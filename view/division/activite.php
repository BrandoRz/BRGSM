<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-history"></i> Activite</h1>
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
            <h3 class="card-title">Liste des </h3>
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