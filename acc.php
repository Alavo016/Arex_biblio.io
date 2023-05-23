<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceuil</title>
  <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
  <link rel="stylesheet" href="css/css/styleacc.css">
  <link rel="stylesheet" href="css/cole.css">
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/css/carousel/carousel.css">
  
  <t>
</head>
<script src="//code.tidio.co/q6pazthxjqeghvobrxc6hapjn6jiwy7g.js" async></script>

<body id="cole">

  <header >

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"  >
      
      <div class="container-fluid">
        <a class="navbar-brand logo" href="acc.php"><img src="media/Vallet__2_-removebg-preview.png"
          alt="logo de ma  bibliotheque" id="lo"><strong>Arex</strong>Bibliotheque</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0 " id="liens">
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              <a class="nav-link  " id="navlien" href="livre.php">Livre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " id="navlien" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
              
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
  <!-- carousel codes -->
  <main>
    
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" id="it" >
        <div class="carousel-item active">
          <img src="media/book in library (3).jpg " class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Bienvenue dans notre bibliothèque en ligne !</h5>
            <p> Découvrez notre vaste collection de livres numériques et profitez d'une expérience de lecture immersive.
              Nous vous proposons des livres de tous genres, que vous soyez à la recherche d'un roman captivant, d'un
              essai inspirant ou d'un livre de cuisine gourmand.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="media/book in library (2).jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">

            <p> Notre plateforme est facile à utiliser, avec une navigation intuitive et des outils pratiques tels que
              la recherche avancée, les recommandations personnalisées</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="media/une bibliothequeavec bcp dde livre.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">

            <p> De plus, vous pouvez gérer votre compte, suivre vos emprunts en cours et les dates de retour prévues, et
              renouveler vos prêts en ligne si nécessaire. Nous faisons de notre mieux pour rendre l'expérience de
              lecture aussi agréable et pratique que possible pour nos membres."



            </p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précedent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
    </div>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img src="media/peggy.jpg" alt=" couverture de livre" id="couv">
          <h2 class="fw-normal">Peggy Sue, le papillon des abîmes</h2>
          <p> Un roman de science-fiction écrit par Michel Pagel. L'histoire suit Peggy Sue, une jeune fille qui est
            projetée dans un futur post-apocalyptique où elle doit faire face à de nombreux dangers et mystères pour
            sauver le monde.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="media/harry.jpg" alt="couverture de livre" id="couv">
          <h2 class="fw-normal">Harry Potter</h2>
          <p> Une série de romans fantastiques écrite par l'auteur britannique J.K. Rowling, racontant les
            aventures du jeune sorcier Harry Potter et de ses amis à l'école de sorcellerie Poudlard</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="media/servante.jfif" alt="couverture de livre" id="couv">
          <h2 class="fw-normal">La Servante écarlate </h2>
          <p>Un roman dystopique écrit par l'auteure canadienne Margaret Atwood, publié en 1985. L'histoire se déroule
            dans une société totalitaire où les femmes fertiles, appelées "servantes", sont assignées à des hommes
            riches pour leur donner des enfants. Le livre a été adapté en série télévisée et a remporté de nombreux
            prix.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">
      <h1 id="cat">Quelques categories de livre que nous proposons</h1>
      <br>
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">Roman</h2>
          <p class="lead" id="roman">Un roman est une œuvre littéraire de fiction qui raconte une histoire longue et
            complexe, généralement centrée sur le développement des personnages et leurs interactions. Les romans
            peuvent appartenir à différents genres, tels que le roman policier, le roman d'amour, le roman historique,
            le roman fantastique, etc. Ils sont souvent utilisés pour explorer des thèmes profonds et universels tels
            que l'amour, la mort, la trahison, l'identité, et peuvent offrir des perspectives uniques sur le monde qui
            nous entoure..</p>
        </div>
        <div class="col-md-5">
          <img src="media/UNE  IMAGE DU STYLE ROMAN UN PEU HUMAIN.jpg" alt="image du genre roman" id="im">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">Science-fiction</h2>
          <p class="lead">La science-fiction est un genre littéraire qui explore les possibilités de la science et de la
            technologie pour créer des mondes imaginaires et des scénarios futuristes. Elle aborde souvent des thèmes
            tels que les voyages dans le temps, l'exploration spatiale, les dystopies, les intelligences artificielles,
            les extraterrestres, et les conséquences de l'évolution technologique sur la société</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="media/UNE  IMAGE DU SCIENCE FICTION UN PEU HUMAIN.jpg" alt="image du genre science-fiction"
            id="im1">
        </div>
      </div>

      <hr class="featurette-divider">


      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
    


  <!--  -->
  
    <!-- FOOTER -->
    <footer class="container">
      <!-- <p class="float-end"><a href="#">Back to top</a></p> -->
      <p >&copy;2023 - Arex bibliothèque  &middot; 
     <span id="foot"><a href="Contact.php" id="lie">Contactez-nous</a> &middot; <a href="faqs.php" id="lie">FAQs</a></span> 
    </p>
    </footer>

</body>

</html>