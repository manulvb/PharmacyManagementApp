<?php
include 'connexion.php';

$pdo->exec("CREATE TABLE IF NOT EXISTS medicaments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    forme VARCHAR(50) NOT NULL,
    dosage VARCHAR(50) NOT NULL,
    prix_vente DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    date_peremption DATE NOT NULL
)");

$stmt = $pdo->query("SELECT * FROM medicaments");
$medicaments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Pharmacie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>💊 Gestion de Pharmacie - Stock</h1>
        <a href="ajouter.php" class="btn">+ Ajouter un médicament</a>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Forme</th>
                    <th>Dosage</th>
                    <th>Prix (FCFA)</th>
                    <th>Stock</th>
                    <th>Péremption</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($medicaments)): ?>
                <tr>
                    <td colspan="6" style="text-align:center;">Aucun médicament enregistré pour le moment.</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($medicaments as $med): ?>
                    <tr>
                        <td><?= htmlspecialchars($med['nom']) ?></td>
                        <td><?= htmlspecialchars($med['forme']) ?></td>
                        <td><?= htmlspecialchars($med['dosage']) ?></td>
                        <td><?= htmlspecialchars($med['prix_vente']) ?></td>
                        <td <?= $med['stock'] < 5 ? 'style="color:red; font-weight:bold;"' : '' ?>>
                            <?= htmlspecialchars($med['stock']) ?>
                        </td>
                        <td><?= htmlspecialchars($med['date_peremption']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
