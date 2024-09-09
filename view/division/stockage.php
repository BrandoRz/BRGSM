<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-table"></i> Stockage</h1>
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
            <h3 class="card-title">Ajout produit</h3>
          </div>      
          <div class="card-body">
              <form action="" class="row">
                <div class="col-sm-4 form-group">
                  <label>Nom</label>
                    <input type="text" id="idPerso" class="form-control" placeholder="Nom ...">
                </div>
                <div class="col-sm-4 form-group">
                  <label>Nombre</label>
                    <input type="number" id="idPerso" class="form-control" placeholder="Nombre ...">
                </div>  
                <div class="col-sm-4 form-group">
                  <label>Fournisseur</label>
                  <select name="" class="form-control" id="">
                    <option value="">EX Fournisseur</option>
                    <option value="">EX Fournisseur</option>
                    <option value="">EX Fournisseur</option>
                    <option value="">EX Fournisseur</option>
                  </select>
                </div>    
              </form>
          </div>      
          <div class="mt-0 card-footer">
              <button class="btn btn-primary btn-block" >Ajouter</button>
            </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Liste des produits</h3>
          </div>  
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Nombre</th>
                <th>Fournisseur</th>
                <th>Date d'ajout</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>2</td>
                <td>Entana</td>
                <td>3</td>
                <td>MALA</td>
                <td>025155</td>
              </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</section>