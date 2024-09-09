<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fas fa-arrow-circle-right"></i> Services</h1>
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
      <div class="col-sm-5">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Produit</h3>
          </div>      
          <div class="card-body">
            <div class="form-group">
              <input type="text" placeholder="Recherche" class="form-control">
            </div>
            <div class="content-scroll">
              <div class="d-flex justify-content-between bg-light m-2 p-2 align-items-center">
                <p>Titre</p>
                <button class="btn btn-sm btn-primary">Ajouter</button>
              </div>
            </div>
          </div>     
        </div>
      </div>
      <div class="col-sm-7">
        <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="card-title">Validation</h3>
            </div>      
            <div class="card-body">
              <form action="" class="row">
                <div class="col-sm-12 form-group">
                  <label>Services</label>
                  <input type="text" id="idPerso" class="form-control" placeholder="Service ...">
                </div>
              </form>
              <div class="content-scroll">
                <table class="table border-none table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Nombre</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>2TITRE2TITRE2TITRE2TITRE2TITRE2TITRE2TITRE</td>
                    <td><input type="number" class="form-control" min="0" max="100" value="0"></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <button class="btn btn-xl btn-primary btn-block">Valider</button>
            </div>     
          </div>
        </div>
      </div>
  </div>
</section>