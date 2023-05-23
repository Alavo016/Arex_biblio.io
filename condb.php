<?php
$host = "localhost"; // nom de l'hôte
$user = "root"; // nom d'utilisateur pour se connecter à la base de données
$pass = ""; // mot de passe pour se connecter à la base de données
$dbname = "biblio"; // nom de la base de données

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $pass, $dbname);


// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
   
