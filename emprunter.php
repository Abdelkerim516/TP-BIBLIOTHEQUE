<?php
include 'db.php';

// on recupere les livres qui ne sont pas deja emprunte
$stmt = $pdo->query("SELECT * FROM livres WHERE disponible = 1");
$livres_disponibles = $stmt->fetchAll();
?>

<h3>Emprunter un Livre</h3>
<form action="traitement_emprunt.php" method="POST">
    <label>Choisir le livre :</label>
    <select name="id_livre" required style="width:100%; padding:10px; margin:10px 0;">
        <?php foreach ($livres_disponibles as $livre): ?>
            <option value="<?= $livre['id'] ?>"><?= htmlspecialchars($livre['titre']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Nom de l'étudiant :</label>
    <input type="text" name="nom_etudiant" required>

    <label>Date de retour prévue :</label>
    <input type="date" name="date_retour" required>

    <button type="submit" class="btn-save">Valider l'emprunt</button>
</form>