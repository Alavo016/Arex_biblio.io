<?php
session_start();

if (isset($_POST['sun'])) {
    // Vérification si le formulaire de connexion a été soumis
    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
        // Récupération des données du formulaire de connexion
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // Connexion à la base de données
        include_once 'condb.php';
        // Préparation et exécution de la requête
        $req = mysqli_prepare($conn, "SELECT * FROM utilisateur WHERE email = ?");
        mysqli_stmt_bind_param($req, "s", $email);
        mysqli_stmt_execute($req);

        $result = mysqli_stmt_get_result($req);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $mdp_hash = $user['mdp'];
            // Vérification du mot de passe
            if (password_verify($mdp, $mdp_hash)) {
                // Mot de passe correct, on démarre la session
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp_hash;
                $_SESSION['id_uti'] = $user['id_uti'];
                 // Stockage du hash de mot de passe pour les éventuelles futures comparaisons
                header("Location: acc.php");
                exit();
            } else {
                $error_msg = "L'email ou le mot de passe est incorrect.";
            }
        } else {
            $error_msg = "L'email ou le mot de passe est incorrect.";
        }
    } else {
        $error_msg = "Veuillez saisir votre email et votre mot de passe.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="fonts/linearicons/style.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
</head>
<body>
    <div class="wrapper">
        <div class="inner">
            <img src="images/image-1.png" alt="" class="image-1">
            <form method="POST" action="">
                <h3>Connexion</h3>
                <?php if (isset($error_msg)): ?>
                    <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                <?php endif; ?>
                <div class="form-holder">
                    <span class="lnr lnr-envelope">*</span>
                    <input type="email" class="form-control" name="email" placeholder="email" required>
                </div>
                
					<div class="form-holder">
						<span class="lnr lnr-lock">*</span>
						<input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
					</div>
                    <button type="submit" name="sun">
						<span>Connexion</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
        <script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
</body>

</html>