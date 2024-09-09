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
              <div action="" class="row">
                <div class="col-sm-4 form-group">
                  <label>Nom</label>
                    <input type="text" id="nomProduit" class="form-control" placeholder="Nom ...">
                </div>
                <div class="col-sm-4 form-group">
                  <label>Nombre</label>
                    <input type="number" id="nombreProduit" class="form-control" placeholder="Nombre ...">
                </div>  
                <div class="col-sm-4 form-group" id="listFournisseurF"></div>    
              </div>
          </div>      
          <div class="mt-0 card-footer">
              <button class="btn btn-primary btn-block" onclick="AddStockage()">Ajouter</button>
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
                <th>Contact</th>
                <th>Date d'ajout</th>
              </tr>
              </thead>
              <tbody id="resultatStock"></tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</section>

<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function AddStockage() {
    var url = "controller/controllerStockage/controller.stockage.php";
      if (confirm("Poursuivre l'action ?")) {
        if ($("#nomProduit").val() != "" || $("#nomProduit").val() != undefined || $("#nombreProduit").val() != "" || $("#nombreProduit").val() != undefined || $("#fournisseurProduit").val() != "" || $("#fournisseurProduit").val() != undefined) {
          $.ajax({
            type: "POST",
            url: url,
            data: ({
              nomProduit: $("#nomProduit").val(),
              nombreProduit: $("#nombreProduit").val(),
              fournisseurProduit: $("#fournisseurProduit").val(),
            }),
            dataType: "text",
            success: function(res) {
              if (res == "ok") {
                $("#nomProduit").val("")
                $("#nombreProduit").val("")
                $("#fournisseurProduit").val("")
                GetAllStockage()
              }else{
                alert(res)
              }
            },
            error: function(e) {
              alert("Erreur")
              window.location.reload()
            }
          });
        }
        else{
          alert("Donnée manquante")
        }
      }
  }

  function GetAllStockage() {
      var url = "controller/controllerStockage/controller.stockage.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getStockage: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#resultatStock").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllStockage()

  function GetAllF() {
      var url = "controller/controllerFournisseur/controller.fournisseur.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getfall: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#listFournisseurF").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllF()

</script>