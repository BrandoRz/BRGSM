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
            <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#AddFournisseur">Ajouter</button>
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

<section class="content">
  <div class="container">
    <div class="row" id="resultat"></div>
  </div>
</section>


<div class="container mt-3">
    <div class="modal fade" id="AddFournisseur">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ajout fournisseur</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" placeholder="Entrer le nom" class="form-control" id="valNom">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" placeholder="Entrer l'adresse" class="form-control" id="valAdresse">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Contact</label>
                        <input type="text" placeholder="Entrer le contact" class="form-control" id="valContact">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <button class="btn btn-primary btn-block" onclick="AddFournisseur()">Ajouter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="container mt-5">
  <div class="modal fade" id="DetailleFournisseur">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detaille fournisseur</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body" id="resDetaille">
            
          </div>
        </div>
      </div>
  </div>
</div>


<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function AddFournisseur() {
    var url = "controller/controllerFournisseur/controller.fournisseur.php";
      if (confirm("Poursuivre l'action ?")) {
        if ($("#valNom").val() != "" || $("#valNom").val() != undefined) {
          $.ajax({
            type: "POST",
            url: url,
            data: ({
              valNom: $("#valNom").val(),
              valAdresse: $("#valAdresse").val(),
              valContact: $("#valContact").val(),
            }),
            dataType: "text",
            success: function(res) {
              if (res == "ok") {
                $("#valNom").val("")
                $("#valAdresse").val("")
                $("#valContact").val("")
                GetAllFournisseur()
                location.reload();
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

  function GetListFournisseurSearch(params){
    var url = "controller/controllerFournisseur/controller.fournisseur.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getFournisseurSearch: params,
        }),
        dataType: "text",
        success: function(res) {
          $("#resultat").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }

  function GetDetaille(params){
    var url = "controller/controllerFournisseur/controller.fournisseur.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getDetaille: params,
        }),
        dataType: "text",
        success: function(res) {
          $("#resDetaille").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }

  function DeleteFournisseur(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce fournisseur ?")) {
        var url = "controller/controllerFournisseur/controller.fournisseur.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                deleteFournisseur: id,
            },
            dataType: "text",
            success: function(res) {
                if (res == "ok") {
                    $('#DetailleFournisseur').modal('hide'); // Fermer la modal
                    GetAllFournisseur(); // Met à jour la liste des fournisseurs
                } else {
                    alert("Erreur lors de la suppression : " + res);
                }
            },
            error: function(e) {
                alert("Erreur lors de la requête AJAX");
            }
        });
    }
}


  function GetAllFournisseur() {
      var url = "controller/controllerFournisseur/controller.fournisseur.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getFournisseur: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#resultat").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllFournisseur()

</script>