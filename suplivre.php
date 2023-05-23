<?php
// Vérification de la soumission du formulaire de suppression
if (isset($_POST['id_livre'])) {

    // Connexion à la base de données
    include_once 'condb.php';

    // Suppression du livre
    $id_livre = $_POST['id_livre'];
    $requete = $bdd->prepare('DELETE FROM livre WHERE id_livre = :id_livre');
    $requete->execute(array('id_livre' => $id_livre));
    header('Location: admin.php#cont');
    
}
?>
