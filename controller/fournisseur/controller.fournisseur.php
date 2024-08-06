<!-- <?php
include '../../config/connex.php'; // Assurez-vous que ce chemin est correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'ajouter') {
        ajouterFournisseur();
    } elseif (isset($_POST['getFournisseurSearch'])) {
        getFournisseurSearch();
    } elseif (isset($_POST['getFournisseur'])) {
        getFournisseur();
    }
}

function ajouterFournisseur() {
    global $db;

    $nom = $_POST['nomFournisseur'];
    $adresse = $_POST['adresseFournisseur'];
    $contact = $_POST['contactFournisseur'];

    $stmt = $db->prepare("INSERT INTO fournisseurs (nom, adresse, contact) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nom, $adresse, $contact);

    if ($stmt->execute()) {
        echo "Fournisseur ajouté avec succès";
    } else {
        echo "Erreur lors de l'ajout du fournisseur: " . $stmt->error;
    }

    $stmt->close();
}

function getFournisseurSearch() {
    global $db;

    $searchTerm = $_POST['getFournisseurSearch'];
    $stmt = $db->prepare("SELECT * FROM fournisseurs WHERE nom LIKE ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4'>
                <div class='card mb-4 shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['nom']}</h5>
                        <p class='card-text'>Adresse: {$row['adresse']}</p>
                        <p class='card-text'>Contact: {$row['contact']}</p>
                    </div>
                </div>
              </div>";
    }

    $stmt->close();
}

function getFournisseur() {
    global $db;

    $stmt = $db->prepare("SELECT * FROM fournisseurs");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4'>
                <div class='card mb-4 shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['nom']}</h5>
                        <p class='card-text'>Adresse: {$row['adresse']}</p>
                        <p class='card-text'>Contact: {$row['contact']}</p>
                    </div>
                </div>
              </div>";
    }

    $stmt->close();
}
?>
