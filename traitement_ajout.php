<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// recuperation de TOUTES les donnees
    $titre  = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $genre  = $_POST['genre']; 
    $annee  = $_POST['annee'];
    $resume = $_POST['resume'];

    try {
        // la requete SQL avec 5 colonnes et 5 points d'interrogation
        $sql = "INSERT INTO livres (titre, auteur, genre, annee_publication, resume) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        
        //  les 5 variables dans l'ordre vont passer en ordre
        if ($stmt->execute([$titre, $auteur, $genre, $annee, $resume])) {
            echo "Livre ajouté avec succès ! <a href='index.php?page=liste'>Voir la liste</a>";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
    }
}
?>