   
    <?php
    // Connexion à la base de données
    include_once 'condb.php';
    
    // Vérification que le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nom_livre = $_POST["nom_livre"];
        $auteur_livre = $_POST["auteur_livre"];
        $genre_livre = $_POST["genre_livre"];
        $description = $_POST["description"];
        $couverture = $_FILES["couverture"];

        // Vérification si le fichier est valide
        if ($couverture["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($couverture["name"]);
            
            // Copie du fichier téléchargé vers le répertoire spécifié
            if (copy($couverture["tmp_name"], $target_file)) {
				$couverture_url = "uploads/" . basename($couverture["name"]);
                // Requête pour ajouter le livre dans la table "livre"
                $sql = "INSERT INTO livre (nom_livre, auteur_livre, genre_livre, description , couverture) VALUES ('$nom_livre', '$auteur_livre', '$genre_livre','$description' ,'$couverture_url')";
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='container mt-3'><div class='alert alert-success'>Le livre a été ajouté avec succès.</div></div>";

                } else {
                    echo "<div class='container mt-3'><div class='alert alert-danger'>Erreur lors de l'ajout du livre : " . mysqli_error($conn) . "</div></div>";
                }
            } else {
                echo "<div class='container mt-3'><div class='alert alert-danger'>Veuillez sélectionner une couverture valide.</div></div>";}
			}
		}

		mysqli_close($conn);
		?>