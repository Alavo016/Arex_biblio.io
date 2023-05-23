<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Détail du livre</title>
	<!-- Liens vers les fichiers CSS -->
	<link rel="stylesheet" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/cole.css">
	<link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fyFQguCfRrLlAgO4IcEhqpiDPeVAuPfOe"
		crossorigin="anonymous">
</head>
<body id="cole">
	<!-- Barre de navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="acc.php">Ma bibliothèque</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="acc.php">Accueil</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Contenu de la page -->
	<div class="container" style="margin-top: 80px;">
		<?php
			include 'codb.php';

			// Récupérer l'identifiant du livre à partir de l'URL
			if (isset($_GET['id_livre'])) {
				$id_livre = $_GET['id_livre'];
			} else {
				// Si l'identifiant n'est pas fourni, renvoyer à la page d'accueil
				header('Location: livre.php');
				exit();
			}

			// Requête SQL pour récupérer les informations du livre
			$sql = "SELECT * FROM livre WHERE id_livre = :id_livre";
			$stmt = $bdd->prepare($sql);
			$stmt->bindValue(':id_livre', $id_livre, PDO::PARAM_INT);
			$stmt->execute();

			// Récupérer les informations du livre
			$livre = $stmt->fetch(PDO::FETCH_ASSOC);

			// Vérifier si le livre a été trouvé
			if (!$livre) {
				echo '<div class="alert alert-danger" role="alert">';
				echo 'Le livre demandé n\'existe pas.';
				echo '</div>';
			} else {
				// Affichage des informations du livre
				echo '<div class="row">';
				echo '<div class="col-lg-4">';
				echo '<img class="img-fluid" src="' . $livre['couverture'] . '" alt="Image de couverture">';
				echo '</div>';
				echo '<div class="col-lg-8">';
				echo '<h1>' . $livre['nom_livre'] . '</h1>';
				echo '<h5>' . $livre['auteur_livre'] . '</h5>';
				echo '<p>Catégorie : ' . $livre['genre_livre'] . '</p>';
				echo '<p>Description : ' . $livre['description'] . '</p>';

				echo '<form action="emp.php" method="POST">';
				echo '<input type="hidden" name="id_livre" value="' . $livre['id_livre'] . '">';
				echo '<button type="submit" class="btn btn-primary">Emprunter</button>';
				echo '</form>';

				echo '</div>';
				echo '</div>';
			}
		?>
	</div>

	<div class="container" style="margin-top: 80px;">
		<div id="latest-books" class="carousel slide" data-ride="carousel">
			<h2 class="text-center mb-4">Les derniers livres ajoutés</h2>

			<!-- Indicateurs -->
			<ol class="carousel-indicators">
				<li data-target="#latest-books" data-slide-to="0" class="active"></li>
				<li data-target="#latest-books" data-slide-to="1"></li>
				<li data-target="#latest-books" data-slide-to="2"></li>
			</ol>
			<div id="featured-books" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php
						$stmt = $bdd->query('SELECT * FROM livre ORDER BY id_livre DESC LIMIT 6');
						$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$count = count($books);
						$first_row = true;
						for ($i = 0; $i < $count; $i++) {
							if ($i % 3 == 0) {
								$active = $first_row ? 'active' : '';
								echo '<div class="carousel-item ' . $active . '"><div class="row">';
								$first_row = false;
							}
							$book = $books[$i];
							echo '
								<div class="col-md-4">
									<div class="card mb-4 box-shadow">
										<img class="card-img-top" src="' . $book['couverture'] . '" alt="' . $book['nom_livre'] . '">
										<div class="card-body">
											<h5 class="card-title">' . $book['nom_livre'] . '</h5>

											<div class="d-flex justify-content-between align-items-center">
												<div class="btn-group">

												</div>
												<small class="text-muted">' . $book['auteur_livre'] . '</small>
											</div>
										</div>
									</div>
								</div>
							';
							if ($i % 3 == 2 || $i == $count - 1) {
								echo '</div></div>';
							}
						}
					?>
				</div>
				<a class="carousel-control-prev" href="#featured-books" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#featured-books" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+L3GiStfTs4+c9jqn3/koD5RytJG5eiw3e2k4bPh/KCfqc/" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
