<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Ajouter un Nouveau Livre</h3>
<form action="traitement_ajout.php" method="POST">
    <label>Titre:</label><input type="text" name="titre" required>
    <label>Auteur(e):</label><input type="text" name="auteur" required>
    <label>Genre</label> <input type="text" name="genre" required>
    <label>Année:</label><input type="number" name="annee">
    <label>Résumé:</label><textarea name="resume" style="width:100%; margin:10px 0;"></textarea>
    <button type="submit" class="btn-save">Enregistrer le Livre</button>
    <a href="index.php" class="btn-cancel">Annuler</a>
</form>
</body>
</html>