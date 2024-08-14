<?php 
	/**
	 * 
	 */
	class Categorie
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

        public function AddCategorie($nom, $description)
		{
			$sql = "INSERT INTO categories(nom, description) VALUES('$nom','$description')";
            $this->bdd->exec($sql);
		}

        public function GetCategorie()
		{
			$sql = "SELECT * FROM categories";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetCategorieById($id)
		{
			$sql = "SELECT * FROM categories WHERE id_categorie=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>