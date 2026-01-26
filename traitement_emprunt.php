<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livre = $_POST['id_livre'];
    $nom = $_POST['nom_etudiant'];
    $date_emprunt = date('Y-m-d');
    $date_retour = $_POST['date_retour'];

    try {
        //  debut de la transaction pour que les deux operations reussissent
        $pdo->beginTransaction();

        // enregistrement dans la table emprunts
        $sql1 = "INSERT INTO emprunts (id_livre, nom_etudiant, date_emprunt, date_retour_prevue) VALUES (?, ?, ?, ?)";
        $pdo->prepare($sql1)->execute([$id_livre, $nom, $date_emprunt, $date_retour]);

        // marquer le livre comme indisponible
        $sql2 = "UPDATE livres SET disponible = 0 WHERE id = ?";
        $pdo->prepare($sql2)->execute([$id_livre]);

        $pdo->commit();
        echo "Emprunt enregistré ! <a href='index.php?page=liste'>Retour</a>";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}
?>