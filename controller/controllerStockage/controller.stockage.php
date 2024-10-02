<?php 
	if (isset($_POST['getHistory'])) {
        include '../../config/connex.php';
        include '../../modele/historique/modele.historique.php';    
        $modeleH = new Historique();
        $donne = $modeleH->GetHistorique();
        foreach ($donne as $key => $value) {
            echo "
                <tr>
                  <td>".$value['action']."</td>
                  <td>".$value['serviceName']."</td>
                  <td>".$value['person']."</td>
                  <td>".$value['nomP']."</td>
                  <td>".$value['nombreS']."</td>
                  <td>".$value['dateH']."</td>
                </tr>
            ";
        }
	}


	if (isset($_POST['getStockageService'])) {
        include '../../config/connex.php';
		include '../../modele/produits/modele.produit.php';    
		$modeleProduit = new Produit();
        $donne = $modeleProduit->GetProduit();
        foreach ($donne as $key => $value) {
            echo "
                <div class='d-flex justify-content-between bg-light m-2 p-2 align-items-center'>
                    <p>".$value['nomP']."</p>
                    <button class='btn btn-sm btn-primary' onclick='AddPanier(".$value['idP'].")'>Ajouter</button>
                </div>
            ";
        }
	}

	if (isset($_POST['getPan'])) {
        include '../../config/connex.php';
		include '../../modele/produits/modele.produit.php';    
		$modeleProduit = new Produit();
        $donne = $modeleProduit->GetPanier();
        foreach ($donne as $key => $value) {
            echo "
                <tr>
                    <td>".$value['nomP']."</td>
                    <td>".$value['nombreP']."</td>
                    <td><input type='number' class='form-control' min='0' max='100' value='".$value['nombre']."' onchange='ChangeNbPanier(".$value['id'].", this)'></td>
                </tr>
            ";
        }
	}

	if (isset($_POST['getStockage'])) {
        include '../../config/connex.php';
		include '../../modele/produits/modele.produit.php';    
		$modeleProduit = new Produit();
        $donne = $modeleProduit->GetProduit();
        foreach ($donne as $key => $value) {
            echo "
                <tr>
                  <td>".$value['idP']."</td>
                  <td>".$value['nomP']."</td>
                  <td>".$value['nombreP']."</td>
                  <td>".$value['nom']."</td>
                  <td>".$value['contact']."</td>
                  <td>".$value['dateProduit']."</td>
                </tr>
            ";
        }
	}

	if (isset($_POST['getFournisseurSearch'])) {
        include '../../config/connex.php';
		include '../../modele/fournisseur/modele.fournisseur.php';    
		$modeleFournisseur = new Fournisseur();
        $donne = $modeleFournisseur->GetFournisseurSearch($_POST['getFournisseurSearch']);
        foreach ($donne as $key => $value) {
            echo "
                <div class='mb-3 col-sm-3'>
                    <div class='small-box bg-info'>
                        <div class='inner'>
                            <h3>".$value['nom']."</h3>
                            <p>".$value['adresse']."</p>
                        </div>
                    </div>
                </div>
            ";
        }
	}

    if (isset($_POST["getDetaille"])){
        include '../../config/connex.php';
		include '../../modele/fournisseur/modele.fournisseur.php';    
		$modeleFournisseur = new Fournisseur();
        $donne = $modeleFournisseur->GetFournisseurById($_POST['getDetaille']);
        if ($donne) {
            echo "
                <div class='row'>
                    <div class='col-sm-12'>
                    <h3>".$donne['nom']."</h3>
                    <hr>
                    <small>
                        Adresse : ".$donne['adresse']."
                        <br>
                        Contact : ".$donne['contact']."
                    </small>
                    </div>
                </div>
            ";
        }
    }

	if (isset($_POST['nomProduit'])) {
        try {
            include '../../config/connex.php';
            include '../../modele/produits/modele.produit.php';    
            include '../../modele/historique/modele.historique.php';    
            $modeleH = new Historique();
            $modeleProduit = new Produit();
            $modeleProduit->AddProduit($_POST['nomProduit'], $_POST['fournisseurProduit'], $_POST['nombreProduit']);
            $modeleH->AddHistorique("AJOUT PRODUIT", NULL, '', $_POST['nomProduit'], $_POST['nombreProduit']);
            echo "ok";
        } catch (\Throwable $th) {
            echo "Donnée invalide";
        }
	}

	if (isset($_POST['upPan'])) {
        include '../../config/connex.php';
        include '../../modele/produits/modele.produit.php';    
        $modeleProduit = new Produit();
        $donne = $modeleProduit->GetPanierId($_POST['upPan']);
        if ($donne) {
            if ($donne["nombreP"] >= $_POST['nb']) {
                $modeleProduit->UpdatePanier($_POST['upPan'], $_POST['nb']);
                echo "ok";
            }else{
                echo "less";
            }
        }else{
            echo "Panier introuvable";
        }
	}

	if (isset($_POST['addpan'])) {
        try {
            include '../../config/connex.php';
            include '../../modele/produits/modele.produit.php';    
            $modeleProduit = new Produit();
            $data = $modeleProduit->GetPanierProduit($_POST['addpan']);
            if ($data) {
                echo "Déjà dans le panier";
            }else{
                $modeleProduit->AddPanier($_POST['addpan']);
                echo "ok";
            }
        } catch (\Throwable $th) {
            echo "Donnée invalide";
        }

	}

	if (isset($_POST['serviceNameProduit'])) {
        try {
            include '../../config/connex.php';
            include '../../modele/service/modele.service.php';    
            include '../../modele/produits/modele.produit.php';    
            include '../../modele/historique/modele.historique.php';    
            $modeleProduit = new Produit();
            $modeleH = new Historique();
            $modeleService = new Service();
            $donne = $modeleProduit->GetPanier();
            $dataPan = "";
            $somme = 0;
            foreach ($donne as $key => $value) {
                $modeleService->AddService($_POST['serviceNameProduit'], $_POST['servicePerson'], $value['produit'], $value['nombre']);
                $modeleProduit->UpdateProduct($value['produit'], $value['nombre']);
                $modeleH-> AddHistorique("ENVOIE PRODUIT", $_POST['serviceNameProduit'], $_POST['servicePerson'], $value['produit'], $value['nombre']);
                $dataPan = $dataPan."
                    <tr>
                        <td>".$_POST['serviceNameProduit']."</td>
                        <td>".$value['produit']."</td>
                        <td>".$value['nombre']."</td>
                    </tr>
                ";
                $somme += $value["nombre"];
            }
            $modeleProduit->TruncatePanier();
            echo "
            <div class='col-12' id='pdfFinal'>
                <div class='invoice p-3 mb-3'>
                    <div class='row'>
                        <div class='col-12'>
                            <h4>
                                GSM, Facture
                                <small class='float-right'>Date: ".date('Y-m-d')."</small>
                            </h4>
                        </div>
                    </div>
                    <div class='row invoice-info'>
                        <div class='col-sm-4 invoice-col'>
                            Responsable
                            <address>
                                <strong>".$_POST['servicePerson']."</strong><br>
                            </address>
                        </div>
                        <div class='col-sm-4 invoice-col'>
                            <b>Facture #".'INV-' . uniqid()."</b><br>
                            <b>Service:</b> DSI<br>
                        </div>
                    </div>
                    <div class='mt-5 row'>
                        <div class='col-12 table-responsive'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Produit</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ".$dataPan."
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-6'>
                        </div>
                        <div class='col-6'>
                            <p class='lead'>Facture ".date('Y-m-d')."</p>
                            <div class='table-responsive'>
                                <table class='table'>
                                    <tbody>
                                        <tr>
                                            <th>Total:</th>
                                            <td>".$somme."</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class='row no-print'>
                        <div class='col-12 text-right'>
                            <label class='mr-5'>Signature</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class='col-12'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-body'>
                            <button onclick='LoadFacture()' type='button' class='btn btn-block btn-primary float-right' style='margin-right: 5px;'>
                                PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                
            
            ";
        } catch (\Throwable $th) {
            echo "Donnée invalide";
        }
	}

	if (isset($_POST['annulerPan'])) {
        try {
            include '../../config/connex.php';
            include '../../modele/produits/modele.produit.php';    
            $modeleProduit = new Produit();
            $modeleProduit->TruncatePanier();
            echo "ok";
        } catch (\Throwable $th) {
            echo "Donnée invalide";
        }
	}
    

 ?>