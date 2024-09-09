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
            <div class="content-scroll" id="resultatStockService"></div>
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
                  <input type="text" id="serviceNameProduit" class="form-control" placeholder="Service ...">
                </div>
              </form>
              <div class="content-scroll">
                <table class="table border-none table-striped">
                  <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Stock</th>
                    <th>Nombre</th>
                  </tr>
                  </thead>
                  <tbody id="resultatPan"></tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <button class="btn btn-xl btn-primary btn-block" onclick="Validation()">Valider</button>
                </div>
                <div class="col-sm-6">
                  <button class="btn btn-xl btn-danger btn-block" onclick="AnnulerService()">Annuler</button>
                </div>
              </div>
            </div>     
          </div>
        </div>
      </div>
  </div>
</section>

<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
  function Validation() {
    var url = "controller/controllerStockage/controller.stockage.php";
      if (confirm("Poursuivre l'action ?")) {
        if ($("#serviceNameProduit").val() != "" || $("#serviceNameProduit").val() != undefined) {
          $.ajax({
            type: "POST",
            url: url,
            data: ({
              serviceNameProduit: $("#serviceNameProduit").val(),
            }),
            dataType: "text",
            success: function(res) {
              if (res == "ok") {
                $("#serviceNameProduit").val("")
                GetAllPan()
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
          alert("Donnée manquante aaaa")
        }
      }
  }

  function ChangeNbPanier(idPanier, event) {
    var url = "controller/controllerStockage/controller.stockage.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        upPan: parseInt(idPanier),
        nb: parseInt(event.value),
      }),
      dataType: "text",
      success: function(res) {
        if (res == "ok") {
          GetAllPan()
        }
        else if(res == "less"){
          alert("Nombre de produit inférieure")
          GetAllPan()
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

  function AddPanier(id) {
    var url = "controller/controllerStockage/controller.stockage.php";
    $.ajax({
      type: "POST",
      url: url,
      data: ({
        addpan: id,
      }),
      dataType: "text",
      success: function(res) {
        if (res == "ok") {
          GetAllPan()
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

  function AnnulerService() {
    if (confirm("Poursuivre l'action ?")) {
      var url = "controller/controllerStockage/controller.stockage.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          annulerPan: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          if (res == "ok") {
            $("#serviceNameProduit").val("")
            GetAllPan()
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
  }

  function GetAllPan() {
      var url = "controller/controllerStockage/controller.stockage.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getPan: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#resultatPan").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllPan()

  function GetAllStockage() {
      var url = "controller/controllerStockage/controller.stockage.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getStockageService: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#resultatStockService").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllStockage()



</script>