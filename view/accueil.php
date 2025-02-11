<!DOCTYPE html>
<html>
<head>
<title>GSM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="content/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="content/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="content/plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet" href="content/css/adminlte.min.css">
	<link rel="stylesheet" href="content/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="content/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="content/plugins/summernote/summernote-bs4.min.css">
  <link rel="icon" href="data/logo1.png">
  <style>
    .content-scroll{
      height: 350px !important;
      overflow-y: scroll !important;
    }
  </style>

  <script src="content/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    function Deco() {
          var url = "controller/controllerPersonnel/controller.personnel.php";
          if (confirm("Se deconnecter ?")) {
            $.ajax({
              type: "POST",
              url: url,
              data: ({
                deconnexion: "go"
              }),
              dataType: "text",
              success: function(res) {
                if (res=="ok") {
                  window.location.reload();
                }else{
                  alert(res);
                }
              }
            });
          }
    }
    $(document).ready(function(){
                $("#new_mdpbtn").click(function(e) {
                    e.preventDefault();
                    $.post(
                      'controller/controllerPersonnel/controller.personnel.php',
                      {
                        new_mdpbtn: "go",
                        idPerso: $("#idPerso").val(),
                        old_mdp: $("#old_mdp").val(),
                        new_mdp1: $("#new_mdp1").val(),
                        new_mdp2: $("#new_mdp2").val()
                      },
                      function(data) {
                        if (data=="OK") {
                          $("#success").html("Effectuer"); 
                          $("#error").html(""); 
                          window.location.reload();
                        }
                        else{
                           $("#error").html(data); 
                        }
                      }
                    );    
                });
    });
  </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
      <div class="container mt-3">
              <div class="modal fade" id="Params">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Paramètre <i class="fas fa-cog"></i></h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col">
                                    <h6 align="left">Mot de passe</h6>
                                  </div>
                                  <div class="col">
                                    <h6 align="right"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ConModal">Modifier</button></h6>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
            </div>

             <div class="container mt-3">
                <div class="modal fade" id="ConModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Changement mot de passe <i class="typcn typcn-cog"></i></h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Ancien mot de passe</label>
                            <input type="text" id="idPerso" hidden value="<?php echo $idPerso; ?>">
                          <input type="password" id="old_mdp" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Nouveau mot de passe</label>
                          <input type="password" id="new_mdp1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Confirmer le nouveau mot de passe</label>
                          <input type="password" id="new_mdp2" class="form-control">
                        </div>
                      </div>
                      <small id="error" style="color: red;text-align: center;"></small>
                      <small id="success" style="color: green;text-align: center;"></small>
                      <div class="modal-footer">
                          <button class="btn btn-sm btn-primary" id="new_mdpbtn">Modifier</button>
                          <small class="btn btn-sm btn-primary" data-dismiss="modal">Annuler</small>
                       </div>
                    </div>
                  </div>
                </div>
          </div>

			<div class="wrapper">

			<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-top: -20px;">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
			      </li>
			    </ul>

			    <ul class="navbar-nav ml-auto">			   

			      <li class="nav-item">
			        <a href="index.php" class="nav-link" role="button">
			          <i class="fas fa-undo"></i>
			        </a>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" data-widget="fullscreen" role="button">
			          <i class="fas fa-expand-arrows-alt"></i>
			        </a>
			      </li>
			      
			      <li class="nav-item dropdown">
			      	<a class="nav-link" data-toggle="dropdown">
			          <i class="far fa-user"></i>
			        </a>
			         <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			          	<span class="dropdown-item dropdown-header"><?php echo $user['nom']." ".$user['prenom']; ?></span>
			         	<div class="dropdown-divider"></div>
			         	<span class="dropdown-item" style="text-align: center;">
				         	<small class="btn btn-primary" data-toggle="modal" data-target="#Params">Paramètre</small>
				         	<a><small class="btn btn-primary" onclick="Deco();">Déconnexion</small></a>
			         	</span>
			          	<div class="dropdown-divider"></div>
			        </div>
			      </li>
			    
			    </ul>
			  </nav>

      <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <div class="sidebar">

        <div class="mt-3 user-panel">
          <span class="info text-white">
            <h3 align="center">GSM</h3>   
          </span>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center">
          <div class="image">
              <img src="data/user/profile.png" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a class="users-list-name"><?php echo $user['nom']." ".$user['prenom']; ?></a>
          </div>
        </div>


            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" onclick="ChangeIt('fournisseur','stockage','activite')">
                  <!-- <a class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Vendre
                    </p>
                  </a> -->
                  </li>
                <li class="nav-item" onclick="ChangeIt('fournisseur','stockage','activite', 'service')">
                  <a class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                    <p>
                      Fournisseur
                    </p>
                  </a>
                </li>
                </li>
                <li class="nav-item" onclick="ChangeIt('stockage','fournisseur','activite', 'service')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Stockage
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="ChangeIt('service','fournisseur','stockage','activite')">
                  <a class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>
                      Services
                    </p>
                  </a>
                </li>
                <li class="nav-item" onclick="ChangeIt('activite','stockage','fournisseur', 'service')">
                  <a class="nav-link">
                    <i class="nav-icon fa fa-history"></i>
                    <p>
                      Activité
                    </p>
                  </a>
                </li>
              </ul><br>

            </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        <span style="display: none;" id="activite"><?php include 'division/activite.php'; ?></span>
          <span style="display: block;" id="fournisseur"><?php include 'division/fournisseur.php'; ?></span>
          <span style="display: none;" id="service"><?php include 'division/service.php'; ?></span>
          <span style="display: none;" id="stockage"><?php include 'division/stockage.php'; ?></span>
    	</div>

		<div class="content-wrapper">
			<span style="display: block;" id="bienvenue"></span>
		    
		</div>
</div>

<script type="text/javascript">
      function ChangeIt(id1,id2,id3,id4) {
        var id1 = document.getElementById(id1)
        var id2 = document.getElementById(id2)
        var id3 = document.getElementById(id3)
        var id4 = document.getElementById(id4)
        id1.style.display = "block"
        id2.style.display = "none"
        id3.style.display = "none"
        id4.style.display = "none"
      }
</script>

		<script src="content/plugins/jquery/jquery.min.js"></script>
		<script src="content/plugins/jquery-ui/jquery-ui.min.js"></script>
		<script>
		  $.widget.bridge('uibutton', $.ui.button)
		</script>
		<script src="content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="content/plugins/chart.js/Chart.min.js"></script>
		<script src="content/plugins/sparklines/sparkline.js"></script>
		<script src="content/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="content/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<script src="content/plugins/jquery-knob/jquery.knob.min.js"></script>
		<script src="content/plugins/moment/moment.min.js"></script>
		<script src="content/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="content/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<script src="content/plugins/summernote/summernote-bs4.min.js"></script>
		<script src="content/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<script src="content/js/adminlte.js"></script>
		<script src="content/js/demo.js"></script>
		<script src="content/js/pages/dashboard.js"></script>
    


</body>
</html>