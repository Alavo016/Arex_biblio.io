<?php
// Inclusion du fichier de configuration
include_once 'condb.php';

// Vérification si l'id_emprunt est défini
if(isset($_POST['id_emprunt'])) {
    $id_emprunt = $_POST['id_emprunt'];

    // Suppression de l'emprunt de la base de données
    $query = "DELETE FROM emprunts WHERE id_emprunt=$id_emprunt";

    if(mysqli_query($conn, $query)) {
        // Redirection vers la page des emprunts
        header('Location: admin.php#pl');
        exit;
    } else {
        echo "Erreur lors de la suppression de l'emprunt : " . mysqli_error($conn);
    }
} else {
    echo "Erreur : l'identifiant de l'emprunt n'est pas défini";
}
?>
