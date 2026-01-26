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
        <h2>GESTION BIBLIOTHÉQUE</h2>
        <a href="index.php?page=ajouter">Ajouter un Livre</a>
        <a href="index.php?page=liste">Modifier un Livre</a>
        <a href="index.php?page=liste">Supprimer un Livre</a>
        <a href="index.php?page=emprunter">Emprunter un Livre</a>
        <a href="index.php" style="margin-top: auto; background: #2a4870;">Retour à l'Accueil</a>
    </div>

   <div class="main-content">
    <div class="card">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'liste';

        if ($page == 'ajouter') {
            include 'form_ajouter.php'; 
        } elseif ($page == 'liste') {
            include 'liste.php';
        } elseif ($page == 'modifier') {
            include 'modifier.php';
        } elseif ($page == 'supprimer') {
            include 'supprimer.php';
        } elseif ($page == 'emprunter') {
            include 'emprunter.php'; 
        } else {
            echo "<h3>Bienvenue</h3><p>Choisissez une option à gauche.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>