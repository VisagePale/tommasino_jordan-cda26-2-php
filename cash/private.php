<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Espace privé</title>
</head>

<body>
    <h2>Bienvenue <?= htmlspecialchars($_SESSION['email']) ?> !</h2>
    <p>Votre rôle : <?= htmlspecialchars($_SESSION['role']) ?></p>

    <a href="logout.php">Se déconnecter</a>
</body>

</html>