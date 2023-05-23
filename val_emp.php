<?php
// Vérifier si la méthode HTTP est bien POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer l'ID de l'emprunt à valider depuis les données POST
    $id_emprunt = $_POST['id_emprunt'];

    // Se connecter à la base de données
   include 'condb.php';

    // Mettre à jour l'état de l'emprunt dans la base de données
    $requete = "UPDATE emprunts SET statut = 'valide' ,date_emprunt = NOW() WHERE id_emprunt = '$id_emprunt'";
    $resultat = mysqli_query($conn, $requete);

    // Vérifier si la mise à jour a réussi
    if ($resultat) {
        header('Location: admin#plk');
    } else {
        echo "Une erreur est survenue lors de la validation de l'emprunt : " . mysqli_error($connexion);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // Si la méthode HTTP n'est pas POST, rediriger l'utilisateur vers la page d'accueil
    ;
    exit();
}
?>
