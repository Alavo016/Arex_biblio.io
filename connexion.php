<?php

session_start();

if (isset($_POST['sun'])) {
    // Vérification si le formulaire de connexion a été soumis
    if ( isset($_POST['mdp'])) {

        // Récupération des données du formulaire de connexion
        
        $mdp = $_POST['mdp'];

        // Connexion à la base de données
        include 'condb.php';

        // Requête pour récupérer l'utilisateur correspondant à l'adresse email et au mot de passe entrés
        $req = mysqli_query($conn, "SELECT * FROM admin WHERE  mdp_admin = '$mdp'");

        if (mysqli_num_rows($req) == 1) {
            
            $_SESSION['mdp_admin'] = $mdp;

            header("Location: admin.php");
            exit();
        } else {
            // L'utilisateur n'a pas été trouvé
            echo "Email et/ou mot de passe incorrect";
        }
    }
}
?>