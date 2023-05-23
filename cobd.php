<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "biblio";

try {
    $bdd = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Échec de la connexion à la base de données : " . $e->getMessage());
}
?>
