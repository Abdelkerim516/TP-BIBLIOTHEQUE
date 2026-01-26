<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM livres WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        
        // executer et verifier
        if ($stmt->execute([$id])) {
            //  rediriger vers la liste
            header("Location: index.php?page=liste&msg=deleted");
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
} else {
    echo "ID manquant pour la suppression.";
}
?>