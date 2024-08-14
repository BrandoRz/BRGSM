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

        public function AddProduit($nom, $description, $prix, $quantite_stock, $id_categorie, $id_fournisseur)
		{
			$sql = "INSERT INTO produits(nom, description, prix, quantite_stock, id_categorie, id_fournisseur) VALUES('$nom', '$description', $prix, $quantite_stock, $id_categorie, $id_fournisseur)";
            $this->bdd->exec($sql);
		}

        public function GetProduit()
		{
			$sql = "SELECT * FROM produits";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetchall();
			}
		}

        public function GetProduitById($id)
		{
			$sql = "SELECT * FROM produits WHERE id_produit=$id";
			$recup = $this->bdd->query($sql);
			if ($recup==true) {
				return $donne = $recup->fetch();
			}
		}

		



	}


 ?>