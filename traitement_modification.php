<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // les données du formulaire
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $genre = $_POST['genre'];
    $annee = $_POST['annee'];
    $resume = $_POST['resume'];

    try {
        // Préparer une requête SQL UPDATE pour mettre à jour les informations
        $sql = "UPDATE livres SET titre = ?, auteur = ?, genre = ?, annee_publication = ?, resume = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        
        // Exécuter la requête et vérifier si la mise à jour a réussi
        if ($stmt->execute([$titre, $auteur, $genre, $annee, $resume, $id])) {
            echo "Modification réussie ! <a href='index.php?page=liste'>Retour à la liste</a>";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la modification : " . $e->getMessage();
    }
}
?>