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
            $modeleH-> AddHistorique("AJOUT PRODUIT", NULL, $_POST['nomProduit'], $_POST['nombreProduit']);
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
            foreach ($donne as $key => $value) {
                $modeleService->AddService($_POST['serviceNameProduit'], $value['produit'], $value['nombre']);
                $modeleProduit->UpdateProduct($value['produit'], $value['nombre']);
                $modeleH-> AddHistorique("ENVOIE PRODUIT", $_POST['serviceNameProduit'], $value['produit'], $value['nombre']);
            }
            $modeleProduit->TruncatePanier();
            echo "ok";
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