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
          <div class="card-body">
            <table class="table border-none table-striped">
                <thead>
                <tr>
                  <th>Action</th>
                  <th>Service</th>
                  <th>Produit</th>
                  <th>Nombre</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody id="resultatHistory"></tbody>
              </table>
          </div>      
        </div>
      </div>
    </div>
  </div>
</section>


<script src="content/jquery/jquery.min.js"></script>
<script type="text/javascript">
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

  function GetAllHistory() {
      var url = "controller/controllerStockage/controller.stockage.php";
      $.ajax({
        type: "POST",
        url: url,
        data: ({
          getHistory: 'ok',
        }),
        dataType: "text",
        success: function(res) {
          $("#resultatHistory").html(res)
        },
        error: function(e) {
          alert("Erreur")
          window.location.reload()
        }
      });
  }GetAllHistory()

</script>