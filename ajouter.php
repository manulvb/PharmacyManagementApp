<?php
include 'connexion.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $forme = $_POST['forme'];
    $dosage = $_POST['dosage'];
    $prix = $_POST['prix_vente'];
    $stock = $_POST['stock'];
    $peremption = $_POST['date_peremption'];

    $sql = "INSERT INTO medicaments (nom, forme, dosage, prix_vente, stock, date_peremption) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nom, $forme, $dosage, $prix, $stock, $peremption])) {
        $message = "Médicament ajouté avec succès !";
    } else {
        $message = "Erreur lors de l'ajout.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un médicament</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un nouveau médicament</h1>
        <a href="index.php" class="btn-retour">← Retour au stock</a>
        
        <?php if($message): ?>
            <p style="color: green; font-weight: bold;"><?= $message ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Nom :</label>
            <input type="text" name="nom" required>

            <label>Forme (Comprimé, Sirop...) :</label>
            <input type="text" name="forme" required>

            <label>Dosage (ex: 500mg) :</label>
            <input type="text" name="dosage" required>

            <label>Prix de vente (FCFA) :</label>
            <input type="number" step="0.01" name="prix_vente" required>

            <label>Quantité en stock :</label>
            <input type="number" name="stock" required>

            <label>Date de péremption :</label>
            <input type="date" name="date_peremption" required>

            <button type="submit" class="btn">Enregistrer</button>
        </form>
    </div>
</body>
</html>
