<?php 
	/**
	 * 
	 */
	class Produit
	{
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

        public function AddProduit($nom, $fournisseur, $nombre)
		{
			$sql = "INSERT INTO produit(nomP, fournisseur, nombreP, dateProduit) VALUES('$nom', $fournisseur, $nombre, NOW())";
            $this->bdd->exec($sql);
		}

        public function AddPanier($idP)
		{
			$sql = "INSERT INTO panier(produit, nombre) VALUES($idP, 1)";
            $this->bdd->exec($sql);
		}

        public function TruncatePanier()
		{
			$sql = "TRUNCATE panier";
            $this->bdd->exec($sql);
		}

        public function UpdatePanier($idPANIER, $nb)
		{
			$sql = "UPDATE panier SET nombre=$nb WHERE id=$idPANIER";
            $this->bdd->exec($sql);
		}

        public function UpdateProduct($idP, $nb)
		{
			$data = $this->GetProduitById($idP);
			if ($data) {
				$diff = $data["nombreP"] - $nb;
				$sql = "UPDATE produit SET nombreP=$diff WHERE idP=$idP";
				$this->bdd->exec($sql);
			}
		}

        public function GetPanier()
		{
			$sql = "SELECT * FROM panier INNER JOIN produit ON panier.produit = produit.idP ORDER BY panier.id DESC";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetPanierProduit($idP)
		{
			$sql = "SELECT * FROM panier WHERE produit=$idP";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

        public function GetProduit()
		{
			$sql = "SELECT * FROM produit INNER JOIN fournisseurs ON produit.fournisseur = fournisseurs.id ORDER BY produit.idP DESC";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetPanierId($idPanier)
		{
			$sql = "SELECT * FROM panier INNER JOIN produit ON panier.produit = produit.idP WHERE panier.id=$idPanier";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

        public function GetProduitById($id)
		{
			$sql = "SELECT * FROM produit WHERE idP=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>