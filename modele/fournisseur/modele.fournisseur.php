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

		public function DeleteFournisseur($id) {
			$sql = "DELETE FROM fournisseurs WHERE id = $id";
			$this->bdd->exec($sql);
		}
		

        public function GetFournisseurSearch($search)
		{
			$sql = "SELECT * FROM fournisseurs WHERE nom LIKE '%$search%' OR adresse LIKE '%$search%' OR contact LIKE '%$search%'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

        public function GetFournisseurById($id)
		{
			$sql = "SELECT * FROM fournisseurs WHERE id=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>