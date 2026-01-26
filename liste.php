<?php
include 'db.php';
//  SELECT pour recuperer tous les livres
$stmt = $pdo->query("SELECT * FROM livres");
$livres = $stmt->fetchAll();
?>
<h3>Liste des livres</h3>
<table border="1" style="width:100%; border-collapse: collapse;">
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Statut</th> <th>Actions</th>
    </tr>
    <?php foreach ($livres as $livre): ?>
    <tr>
        <td><?= htmlspecialchars($livre['titre']) ?></td>
        <td><?= htmlspecialchars($livre['auteur']) ?></td>
        <td> <?php if ($livre['disponible'] == 1): ?>
                <span style="color:green;">Disponible</span>
            <?php else: ?>
                <span style="color:red;">Emprunté</span>
            <?php endif; ?>
        </td>
        <td>
            <a href="index.php?page=modifier&id=<?= $livre['id'] ?>">Modifier</a> | 
            <a href="index.php?page=supprimer&id=<?= $livre['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>