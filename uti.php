<?php
// conn à la base de données
include_once 'condb.php';
// Requête pour sélectionner tous les utilisateurs
$requete = "SELECT * FROM utilisateur";

// Exécuter la requête et récupérer les résultats
$resultat = mysqli_query($conn, $requete);

// Vérifier si la requête a échoué
if (!$resultat) {
    die("La requête a échoué: " . mysqli_error($conn));
}

// Créer un tableau pour stocker les utilisateurs
$utilisateurs = array();

// Boucle pour ajouter chaque utilisateur au tableau
while ($ligne = mysqli_fetch_assoc($resultat)) {
    $utilisateurs[] = $ligne;
}

// Fermer la conn à la base de données
mysqli_close($conn);
?>