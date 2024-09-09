<?php 
	/**
	 * 
	 */
	class Historique
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

        public function AddHistorique($action, $name, $produit, $nombreS)
		{
			if ($name) {
				$sql = "INSERT INTO historique(action, serviceName, produit, nombreS, dateH) VALUES('$action', '$name', $produit, $nombreS, NOW())";
			}else{
				$sql = "INSERT INTO historique(action, serviceName, produit, nombreS, dateH) VALUES('$action', NULL, $produit, $nombreS, NOW())";
			}
			$this->bdd->exec($sql);
		}

        public function GetHistorique()
		{
			$sql = "SELECT * FROM historique INNER JOIN produit ON historique.id = produit.idP";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetHistoriqueById($id)
		{
			$sql = "SELECT * FROM historique WHERE id=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>