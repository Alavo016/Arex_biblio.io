<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Livre</title>
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css/styleacc.css">
  <link rel="stylesheet" href="css/cole.css">
  <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
</head>
<body id="cole">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="accetd.php"><img src="media/Vallet__2_-removebg-preview.png"
                        alt="logo de ma  bibliotheque" id="lo"><strong>Arex</strong>Bibliotheque</a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 " id="liens">
                        <li class="nav-item">
                            <a class="nav-link  " id="navlien" href="accetd.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " id="navlien" href="livre.php">Livre</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="navlien" href="profil.php">Profil</a>
                        </li>
                        
                    </ul>

                    <form action="recherche.php" method="POST" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="nom_livre" name="nom_livre">
            <input class="btn btn-outline-success" type="submit" value="Recherche">
          </form>
                </div>
            </div>
        </nav>
    </header>
<br><br><br>
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-3">
        <form action="recherche.php" method="POST" class="d-flex" role="search">
          <div class="input-group">
            <input class="form-control me-2" type="Search" class="form-control" placeholder="Recherche" name="nom_livre">
            <div class="input-group-append">
            <input class="btn btn-outline-success" type="submit"  value="Recherche">
            </div>
          </div>
        </form>
        <h3 class="my-3">Catégories</h3>
        <div class="list-group">
          <a href="roman.php" class="list-group-item">Roman</a>
          <a href="scific.php" class="list-group-item">Science-fiction</a>
          <a href="mangas.php" class="list-group-item">Manga</a>
          <a href="poli.php" class="list-group-item">Policier</a>
        </div>
      </div>
<div class="col-lg-9">
        <div class="row">
        <?php
// Connexion à la base de données
include_once 'condb.php';

// Requête pour récupérer les livres de la catégorie mangas
$sql = "SELECT * FROM livre WHERE genre_livre = 'Science-Fiction'";

// Exécution de la requête
$resultat = mysqli_query($conn, $sql);

// Vérification du nombre de résultats
if (mysqli_num_rows($resultat) > 0) {
    // Affichage des résultats
    while ($livre = mysqli_fetch_assoc($resultat)) {
?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="<?= $livre['couverture'] ?>" alt="Image de couverture" height="350px">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="detail.php?id_livre=<?= $livre['id_livre'] ?>"><?= $livre['nom_livre'] ?></a>
                    </h4>
                    <h5><?= $livre['auteur_livre'] ?></h5>
                    <p class="card-text"><strong>Catégorie : </strong><?= $livre['genre_livre'] ?></p>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "Aucun livre trouvé dans la catégorie Mangas.";
}

// Fermeture de la connexion
mysqli_close($conn);
?>

    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<!-- Footer -->
<footer class="container">
    <!-- <p class="float-end"><a href="#">Back to top</a></p> -->
    <p >&copy;2023 - Arex bibliothèque  &middot; 
   <span id="foot"><a href="Contact.php" id="lie">Contactez-nous</a> &middot; <a href="faqs.php" id="lie">FAQs</a></span> 
  </p>
  </footer>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>   
  