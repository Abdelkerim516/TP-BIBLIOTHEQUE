<?php
include 'db.php';

// Récupérer l'id du livre depuis l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Requête SQL DELETE
    $sql = "DELETE FROM livres WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$id])) {
        // Rediriger l'utilisateur vers la liste
        header("Location: index.php?page=liste");
        exit();
    }
}
?>