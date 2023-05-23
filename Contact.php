<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="css/css/styleacc.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <script src="js/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/css/assets/css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/css/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/css/assets/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
     <script src="css/css/assets/js/template.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body id="cole">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand logo" href="acc.php"><img src="media/Vallet__2_-removebg-preview.png"
                        alt="logo de ma  bibliotheque" id="lo"><strong>Arex</strong>Bibliotheque</a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse" >
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 " id="liens">
                        <li class="nav-item">
                            <a class="nav-link  " id="navlien" href="accetd.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " id="navlien" href="esslivre.php">Livre</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="navlien" href="Emprunt.php">Emprunt</a>
                        </li>
                        
                    </ul>

                   
                </div>
            </div>
        </nav>
    </header>

    <!-- container -->
    <div class="container">

        
        <div class="row">

            <!-- Article main content -->
            <article class="col-sm-9 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Contactez-nous </h1>
                </header>

                <p>
                </p>
                <br>
                <form action="message.php" method="POST" >
                    <div class="row">
                        <div class="col-sm-4">
                            <input class="form-control" type="text" placeholder="Email" name="Email">
                        </div>
            
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea placeholder="Tapez votre message..." class="form-control" rows="9" name="mess"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        
                        <div class="col-sm-6 text-right">
                            <input id="inp" class="btn btn-action" type="submit" value="Envoyez votre Message" name="sun">
                        </div>
                    </div>
                </form>

            </article>
            <!-- /Article -->

            <!-- Sidebar -->
            <aside class="col-sm-3 sidebar sidebar-right">

                <div class="widget">
                    <h4>Address</h4>
                    <address>
                        Zopah, Arconvile, Abomey Calavi City
                    </address>
                    <h4>Phone:</h4>
                    <address>
                        +229 53065889
                    </address>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </div> <!-- /container -->

    <br>
    

    <footer id="footer" >

        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-body">
                            <p>+229 53065889<br>
                                <br>
                                Zopah, Arconvile, Abomey Calavi City
                            </p>
                        </div>
                    </div>

                    

                    <div class="col-md-6 widget" id="textco">
                        <h3 class="widget-title">Presentation</h3>
                        <div class="widget-body">
                            <p>Bienvenue sur notre page "Contactez-nous" ! Nous sommes ravis que vous ayez choisi notre
                                bibliothèque en ligne pour votre prochaine lecture. Si vous avez des questions, des
                                commentaires ou des préoccupations, n'hésitez pas à nous contacter.
                            </p>
                            <p> Nous sommes là pour vous aider à naviguer dans notre collection numérique et répondre à
                                toutes vos questions. Vous pouvez nous contacter en remplissant le formulaire de contact
                                ci-dessous ou en utilisant les informations de contact fournies. Nous sommes disponibles
                                pour vous aider du lundi au vendredi de 9h à 17h, heure locale. Nous sommes impatients
                                de vous entendre et de vous aider à trouver votre prochain livre préféré !</p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">

                    

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                             &copy; 2023 - Arex bibliothèque  
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>
    </footer>





    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/headroom.min.js"></script>
    <script src="assets/js/jQuery.headroom.min.js"></script>
    <script src="assets/js/template.js"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script>
    <script src="assets/js/google-map.js"></script>


</body>

</html>