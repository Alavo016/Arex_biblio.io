<?php
session_start();

include 'condb.php';

if (isset($_POST["sun"])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $anni = $_POST['anni'];
  $mdp = $_POST['mdp'];
  $confirmdp = $_POST['confirmdp'];

  if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email) && !empty($anni) && !empty($mdp) && !empty($confirmdp)) {

    $check_email_query = "SELECT * FROM utilisateur WHERE email=?";
    $stmt = mysqli_prepare($conn, $check_email_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
		$msg = "Cet email est déjà utilisé.";
		$msgClass = "alert-danger";
	} elseif ($mdp !== $confirmdp) {
		$msg = "Les mots de passe ne correspondent pas.";
		$msgClass = "alert-danger";
	} else {
      $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);
      $insert_query = "INSERT INTO utilisateur (nom, prenom, tel, email, anni, dateenr, mdp) VALUES (?, ?, ?, ?, ?, NOW(), ?)";
      $stmt = mysqli_prepare($conn, $insert_query);
      mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom, $tel, $email, $anni, $hashed_password);
      $result = mysqli_stmt_execute($stmt);

      if ($result) {
		$msg  = "Votre compte a été créé avec succès.";
		$msgClass = "alert-danger";
        header("Location: recon.php");

        exit;
      } else {
        $msgClass = "Erreur lors de l'insertion des données dans la base de données : " . mysqli_error($conn);
      }
    }
  } else {
    $msg = "Veuillez remplir tous les champs.";
    $msgClass = "alert-danger";
  }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		<link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form method="POST" action="">
					<h3>Inscription</h3>
					<?php if (isset($msg)): ?>
    <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
<?php endif; ?>



					
					<div class="form-holder">
						<span class="lnr lnr-user">*</span>
						<input type="text" class="form-control" name="nom" placeholder="Nom" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user">*</span>
						<input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset">*</span>
						<input type="tel" class="form-control" name="tel" placeholder="Téléphone" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope">*</span>
						<input type="email" class="form-control" name="email" placeholder="Email" required></input>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-calendar-full">*</span>
						<input type="date" class="form-control" name="anni" placeholder="Date de naissance" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock">*</span>
						<input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
					</div>
					
					<div class="form-holder">
						<span class="lnr lnr-lock">*</span>
						<input type="password" class="form-control" name="confirmdp" placeholder="Confirmez mot de passe " required>
					</div>
					<button type="submit" name="sun">
						<span>Inscription</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
