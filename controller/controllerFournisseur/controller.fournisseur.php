<?php 
	if (isset($_POST['getFournisseur'])) {
        include '../../config/connex.php';
		include '../../modele/fournisseur/modele.fournisseur.php';    
		$modeleFournisseur = new Fournisseur();
        $donne = $modeleFournisseur->GetFournisseur();
        foreach ($donne as $key => $value) {
            echo "
                <div class='mb-3 col-sm-3' data-toggle='modal' data-target='#DetailleFournisseur' onclick='GetDetaille(".$value['id_fournisseur'].")'>
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

	if (isset($_POST['valNom'])) {
        include '../../config/connex.php';
		include '../../modele/fournisseur/modele.fournisseur.php';    
		$modeleFournisseur = new Fournisseur();
        $modeleFournisseur->AddFournisseur($_POST['valNom'], $_POST['valAdresse'], $_POST['valContact']);
        echo "ok";
	}





 ?>