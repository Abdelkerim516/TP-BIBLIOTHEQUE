<?php
include 'db.php';

//  l'id du livre depuis l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer une requête SELECT pour récupérer les informations du livre à modifier
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
    $stmt->execute([$id]);
    $livre = $stmt->fetch();

    if (!$livre) {
        die("Livre non trouvé.");
    }
} else {
    die("ID manquant.");
}
?>

<h3>Modifier le Livre</h3>
<form action="traitement_modification.php" method="POST">
    <input type="hidden" name="id" value="<?= $livre['id'] ?>">

    <label>Titre:</label>
    <input type="text" name="titre" value="<?= htmlspecialchars($livre['titre']) ?>" required>
    
    <label>Auteur(e):</label>
    <input type="text" name="auteur" value="<?= htmlspecialchars($livre['auteur']) ?>" required>
    
    <label>Genre:</label>
    <input type="text" name="genre" value="<?= htmlspecialchars($livre['genre']) ?>" required>
    
    <label>Année:</label>
    <input type="number" name="annee" value="<?= $livre['annee_publication'] ?>">
    
    <label>Résumé:</label>
    <textarea name="resume" style="width:100%; margin:10px 0;"><?= htmlspecialchars($livre['resume']) ?></textarea>
    
    <button type="submit" class="btn-save">Mettre à jour le Livre</button>
    <a href="index.php?page=liste" class="btn-cancel">Annuler</a>
</form>