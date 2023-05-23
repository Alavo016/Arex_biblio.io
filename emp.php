<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_uti'])) {
    header('Location: recon.php');
    exit();
}

// Inclure le fichier de connexion à la base de données
include 'codb.php';

// Récupérer l'identifiant du livre à partir de la requête POST
if (!isset($_POST['id_livre'])) {
    header('Location: livre.php');
    exit();
}
$id_livre = $_POST['id_livre'];

// Récupérer les informations sur l'utilisateur
$sql_utilisateur = "SELECT nom, prenom FROM utilisateur WHERE id_uti = :id_uti";
$stmt_utilisateur = $bdd->prepare($sql_utilisateur);
$stmt_utilisateur->bindValue(':id_uti', $_SESSION['id_uti'], PDO::PARAM_INT);
$stmt_utilisateur->execute();
$result_utilisateur = $stmt_utilisateur->fetch();
$nom_utilisateur = $result_utilisateur['nom'];
$prenom_utilisateur = $result_utilisateur['prenom'];

// Récupérer les informations sur le livre
$sql_livre = "SELECT nom_livre FROM livre WHERE id_livre = :id_livre";
$stmt_livre = $bdd->prepare($sql_livre);
$stmt_livre->bindValue(':id_livre', $id_livre, PDO::PARAM_INT);
$stmt_livre->execute();
$result_livre = $stmt_livre->fetch();
$titre_livre = $result_livre['nom_livre'];

// Requête SQL pour enregistrer la demande d'emprunt
$sql = "INSERT INTO emprunts (id_livre, id_uti, nom_utilisateur, prenom_utilisateur, nom_livre, date_demande, statut) VALUES (:id_livre, :id_uti, :nom_uti, :prenom_uti, :titre_livre, NOW(), 'attente')";
$stmt = $bdd->prepare($sql);
$stmt->bindValue(':id_livre', $id_livre, PDO::PARAM_INT);
$stmt->bindValue(':id_uti', $_SESSION['id_uti'], PDO::PARAM_INT);
$stmt->bindValue(':nom_uti', $nom_utilisateur, PDO::PARAM_STR);
$stmt->bindValue(':prenom_uti', $prenom_utilisateur, PDO::PARAM_STR);
$stmt->bindValue(':titre_livre', $titre_livre, PDO::PARAM_STR);
$stmt->execute();

// Rediriger l'utilisateur vers la page du livre avec un message de confirmation
header('Location: detail.php?id_livre=' . $id_livre . '&message=demande_emprunt_success');
exit();
?>
