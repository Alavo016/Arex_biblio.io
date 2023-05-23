<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification de la soumission du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $mdp = $_POST['mdp'] ?? '';
    $mdp_verif = $_POST['confirmdp'] ?? '';

    $errors = [];

    // Validation des champs
    if (empty($nom)) {
        $errors[] = 'Le nom est obligatoire';
    }
    if (empty($prenom)) {
        $errors[] = 'Le prénom est obligatoire';
    }
    if (empty($email)) {
        $errors[] = 'L\'email est obligatoire';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'L\'email est invalide';
    } else {
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM utilisateur WHERE email = ?');
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $errors[] = 'Cet email est déjà utilisé';
        }
    }
    if (empty($mdp)) {
        $errors[] = 'Le mot de passe est obligatoire';
    } else if (strlen($mdp) < 8) {
        $errors[] = 'Le mot de passe doit contenir au moins 8 caractères';
    }
    if ($mdp !== $mdp_verif) {
        $errors[] = 'Les mots de passe ne correspondent pas';
    }

    if (empty($errors)) {
        // Hachage du mot de passe
        $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $stmt = $pdo->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nom, $prenom, $email, $hashed_password]);

        $_SESSION['flash_message'] = 'Vous êtes maintenant inscrit. Connectez-vous pour accéder à votre compte.';
        header('Location: connexion.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styleacc.css">
</head>
<body>
    <h1>Inscription</h1>
    <?php if (!empty($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
    <form method="post">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($nom) ?>">
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($prenom) ?>">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
        </div
