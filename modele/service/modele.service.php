<?php 
	/**
	 * 
	 */
	class Service
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

        public function AddService($nom, $produit, $nombre)
		{
			$sql = "INSERT INTO envoye_service(nom, produit, nombre, dateService) VALUES('$nom', $produit, $nombre, NOW())";
            $this->bdd->exec($sql);
		}

        public function GetService()
		{
			$sql = "SELECT * FROM envoye_service";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetServiceById($id)
		{
			$sql = "SELECT * FROM envoye_service WHERE id=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>