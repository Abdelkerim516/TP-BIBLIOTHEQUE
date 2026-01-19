<?php
include 'db.php';
// Requête SELECT pour récupérer tous les livres
$stmt = $pdo->query("SELECT * FROM livres");
$livres = $stmt->fetchAll();
?>

<h3>Liste des livres</h3>
<table border="1" style="width:100%; border-collapse: collapse;">
    <tr>
        <th>Titre</th><th>Auteur</th><th>Actions</th>
    </tr>
    <?php foreach ($livres as $livre): ?>
    <tr>
        <td><?= htmlspecialchars($livre['titre']) ?></td>
        <td><?= htmlspecialchars($livre['auteur']) ?></td>
        <td>
            <a href="index.php?page=modifier&id=<?= $livre['id'] ?>">Modifier</a> | 
            <a href="index.php?page=supprimer&id=<?= $livre['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>