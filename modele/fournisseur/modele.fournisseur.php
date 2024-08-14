<?php 
	/**
	 * 
	 */
	class Fournisseur
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

        public function AddFournisseur($nom, $adresse, $contact)
		{
			$sql = "INSERT INTO fournisseurs(nom, adresse, contact) VALUES('$nom', '$adresse', '$contact')";
            $this->bdd->exec($sql);
		}

        public function GetFournisseur()
		{
			$sql = "SELECT * FROM fournisseurs";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetFournisseurById($id)
		{
			$sql = "SELECT * FROM fournisseurs WHERE id_fournisseur=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>