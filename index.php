<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion de la Bibliothèque</title>
</head>
<body>

    <div class="sidebar">
        <h2>GESTION BIBLIO</h2>
        <a href="index.php?page=ajouter">➕ Ajouter un Livre</a>
        <a href="index.php?page=modifier">✏️ Modifier un Livre</a>
        <a href="index.php?page=supprimer">🗑️ Supprimer un Livre</a>
        <a href="index.php?page=emprunter">📖 Emprunter un Livre</a>
        <a href="index.php" style="margin-top: auto; background: #2a4870;">⬅️ Retour à l'Accueil</a>
    </div>

   <div class="main-content">
    <div class="card">
        <?php 
        // On récupère le nom de la page dans l'URL (ex: ?page=ajouter)
        $page = isset($_GET['page']) ? $_GET['page'] : 'liste';

        // On vérifie si le fichier existe avant de l'inclure
        if ($page == 'ajouter') {
            include 'form_ajouter.php'; 
        } elseif ($page == 'liste') {
            include 'liste.php'; // Ce fichier doit contenir le SELECT
        } elseif ($page == 'modifier') {
            include 'modifier.php'; // Étape 4 de votre document
        } elseif ($page == 'supprimer') {
            include 'supprimer.php'; // Étape 7 de votre document
        } else {
            echo "<h3>Bienvenue</h3><p>Choisissez une option à gauche.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>