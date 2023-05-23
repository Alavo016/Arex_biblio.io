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

<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #333;
		}
		form {
			max-width: 500px;
			margin: auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		button:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Page de connexion</h1>
	<form method="POST" action="">
		
		<label for="password">Mot de passe:</label>
		<input type="password" id="password" name="mdp" required>

		<button type="submit" name="sun">Se connecter</button>
	</form>
</body>
</html>
