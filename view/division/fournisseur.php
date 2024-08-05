<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Fournisseur</title>
  <!-- Ajoutez ici les liens vers vos fichiers CSS existants -->
  <link rel="stylesheet" href="path/to/your/css/style.css">
  <script src="path/to/your/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
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
              <button type="button" class="btn btn-primary ml-auto" onclick="location.href='ajouter_fournisseur.php'">Ajouter</button>
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

  <!-- <script type="text/javascript">
    function GetListFournisseurSearch(valeur) {
      if (valeur != "") {
        var url = "controller/fournisseur/controller.fournisseur.php";
        $.ajax({
          type: "POST",
          url: url,
          data: {
            getFournisseurSearch: valeur,
          },
          dataType: "text",
          success: function(res) {
            $("#listFournisseur").html(res);
          },
          error: function(e) {
            alert("Erreur");
            window.location.reload();
          }
        });
      } else {
        GetListFournisseur('listFournisseur');
      }
    }

    function GetListFournisseur(output) {
      var url = "controller/fournisseur/controller.fournisseur.php";
      $.ajax({
        type: "POST",
        url: url,
        data: {
          getFournisseur: 56,
        },
        dataType: "text",
        success: function(res) {
          $("#" + output).html(res);
        },
        error: function(e) {
          alert("Erreur");
          window.location.reload();
        }
      });
    }

    GetListFournisseur('listFournisseur');
  </script> -->
</body>
</html>
