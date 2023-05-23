<!doctype html>
<html lang="en">

<head>
    <title>Administrateur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/stat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>

   
    
    


<body >

<div class="container">
    <div id="top" >
        <div class="logo">
            <h2>Arex Admin</h2>
        </div>
        <div class="search">
            <input type="text" id="search" placeholder="Rechercher">
            <label for="seach"> <i class="fas fa-search"></i></label>
        </div>
        <i class="fas fa-bell" ></i>
        <div class="user">
            <img src="R.png" alt="user-picture" >
        </div>
    </div>
    <div class="sidebar">
    <ul >
                <li >
                    <a href="#"><span class="fa fa-home "></span> Home</a>
                </li>
                <li>
                    <a href="#cont"><span class="fa fa-book-open "></span> Livre</a>
                </li>
                <li>
                    <a href="#conte"><span class="fa fa-plus "></span> Ajouter un livre</a>
                </li>
                
                <li>
                    <a href="#con"><span class="fa fa-users "></span> Liste des utlilisateur</a>
                </li>
                <li>
                    <a href="#pl"><span class="fa fa-list "></span> Liste d'emprunt</a>
                </li>
                <li>
                    <a href="#plk"><span class="fa fa-list "></span>Demande d'Emprunt </a>
                </li>
                <li>
                    <a href="#plk1"><span class="fa fa-list "></span> Historique d'Emprunt</a>
                </li>
                
                <li>
                    <a href="listemsg.php"><span  class="fas fa-envelopes"></span> Liste des Messages</a>
                </li>
            </ul>
    </div>
    <div id="content" class="p-4 p-md-5 pt-5">
    <div class="row align-items-stretch">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <?php
                        // Inclusion du fichier de connexion à la base de données
                        include_once 'condb.php';

                        // Requête pour récupérer le nombre d'utilisateurs
                        $query = "SELECT COUNT(*) AS nb_users FROM utilisateur";
                        $result = mysqli_query($conn, $query);

                        // Vérification si la requête a réussi
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $nb_users = $row['nb_users'];
                            echo "<h2><i class='fa fa-user'></i> Nombre d'utilisateurs</h2>";
                            echo "<p>".$nb_users."</p>";
                        } else {
                            echo "Erreur lors de la récupération du nombre d'utilisateurs.";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <?php
                        // Requête pour récupérer le nombre de demandes d'emprunts
                        $query = "SELECT COUNT(*) AS nb_emprunts FROM emprunts";
                        $result = mysqli_query($conn, $query);

                        // Vérification si la requête a réussi
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $nb_emprunts = $row['nb_emprunts'];
                            echo "<h2><i class='fa fa-book'></i> Nombre de demandes d'emprunts</h2>";
                            echo "<p>".$nb_emprunts."</p>";
                        } else {
                            echo "Erreur lors de la récupération du nombre de demandes d'emprunts.";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <?php
                        // Requête pour récupérer le nombre de retours de livres
                        $query = "SELECT COUNT(*) AS nb_retours FROM livre ";
                        $result = mysqli_query($conn, $query);

                        // Vérification si la requête a réussi
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $nb_retours = $row['nb_retours'];
                            echo "<h2><i class='fa fa-book-open'></i> Nombre  livres</h2>";
                            echo "<p>".$nb_retours."</p>";
                        } else {
                            echo "Erreur lors de la récupération du nombre de retours de livres.";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <?php
                        // Requête pour récupérer le nombre de messages adressés aux utilisateurs
                        $query = "SELECT COUNT(*) AS nb_messages FROM messa";
                        $result = mysqli_query($conn, $query);

                        // Vérification si la requête a réussi
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $nb_messages = $row['nb_messages'];
                            echo "<h2><i class='fa fa-envelope'></i> Nombre de messages adressés aux utilisateurs</h2>";
                            echo "<p>".$nb_messages."</p>";
                            } else {
                            echo "Erreur lors de la récupération du nombre de messages adressés aux utilisateurs.";
                            }
                            ?>
                 </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <br><hr>
    <div >
    <h1 id="cont">Liste des livres</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connexion à la base de données
                include 'codb.php';
                // Récupération des livres
                $livres = $bdd->query('SELECT * FROM livre');

                // Initialisation du compteur de livres
                $num_livre = 1;

                // Parcours des livres et affichage dans le tableau
                while ($livre = $livres->fetch()) {
            ?>
            <tr>
                <td><?php echo $num_livre; ?></td>
                <td><?php echo $livre['id_livre']; ?></td>
                <td><?php echo $livre['nom_livre']; ?></td>
                <td><?php echo $livre['auteur_livre']; ?></td>
                <td><?php echo $livre['genre_livre']; ?></td>
                <td>
                    <form method="post" action="suplivre.php">
                        <input type="hidden" name="id_livre" value="<?php echo $livre['id_livre']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php
                // Incrémentation du compteur de livres
                $num_livre++;
                }
            ?>
        </tbody>
    </table>
</div>
<hr>
    <br>
    <br><hr>
<div id="conte" >

        <h1 >Ajouter un Livre</h1>
        <form method="POST" enctype="multipart/form-data" action="ajtlivre.php" >
    <div class="form-group">
        <label for="nom_livre">Nom du Livre:</label>
        <input type="text" class="form-control" id="nom_livre" name="nom_livre" required>
    </div>
    <div class="form-group">
        <label for="auteur_livre">Auteur:</label>
        <input type="text" class="form-control" id="auteur_livre" name="auteur_livre" required>
    </div>
    <div class="form-group">
        <label for="genre_livre">Genre:</label>
        <input type="text" class="form-control" id="genre_livre" name="genre_livre"  required>
    </div>
    
    <div class="form-group">
        <label for="genre_livre">Description:</label>
        <input type="text" class="form-control" id="decription" name="description"  required>
    </div>

    <div class="form-group">
        <label for="couverture">Couverture:</label>
        <input type="file" class="form-control-file" id="couverture" name="couverture" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter Livre</button>
</form>
   
        </div>
        <hr>
    <br>
    <br><hr>
    <div id="con">
        <?php
        include_once 'uti.php';
        ?>

    <h1>Liste des Utilisateurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Date d'enregistrement</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Boucle pour afficher la liste des utilisateurs
            foreach ($utilisateurs as $index => $utilisateur) {
            ?>
                <tr>
                    <th scope="row"><?php echo $index + 1; ?></th>
                    <td><?php echo $utilisateur['id_uti']; ?></td>
                    <td><?php echo $utilisateur['nom']; ?></td>
                    <td><?php echo $utilisateur['prenom']; ?></td>
                    <td><?php echo $utilisateur['email']; ?></td>
                    <td><?php echo $utilisateur['tel']; ?></td>
                    <td><?php echo $utilisateur['anni']; ?></td>
                    <td><?php echo $utilisateur['dateenr']; ?></td>
                    <td>
                        <form method="POST" action="supprimer_utilisateur.php">
                            <input type="hidden" name="id_uti" value="<?php echo $utilisateur['id_uti']; ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<hr>
    <br>
    <br><hr>
<div id="pl" >
    <?php
    // Inclusion du fichier de configuration
    include_once 'condb.php';
    // Récupération de la liste des emprunts valides
$query = "SELECT id_emprunt, id_livre, id_uti, date_demande, nom_utilisateur, prenom_utilisateur, date_emprunt, nom_livre, statut, date_retour 
FROM emprunts 
WHERE statut='valide'";

$result = mysqli_query($conn, $query);

// Vérification s'il y a des emprunts valides
if($result && mysqli_num_rows($result) > 0) {

    ?>
    
    <h1>Liste des emprunts validés</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID livre</th>
                <th scope="col">Nom livre</th>
                <th scope="col">ID utilisateur</th>
                <th scope="col">Nom utilisateur</th>
                <th scope="col">Prénom utilisateur</th>
                <th scope="col">Date de demande</th>
                <th scope="col">Date d'emprunt</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Boucle pour afficher la liste des emprunts validés
            while ($emprunt = mysqli_fetch_assoc($result)) {
                if ($emprunt['statut'] == 'valide') {
            ?>
                    <tr>
                        <td><?php echo $emprunt['id_emprunt']; ?></td>
                        <td><?php echo $emprunt['id_livre']; ?></td>
                        <td><?php echo $emprunt['nom_livre']; ?></td>
                        <td><?php echo $emprunt['id_uti']; ?></td>
                        <td><?php echo $emprunt['nom_utilisateur']; ?></td>
                        <td><?php echo $emprunt['prenom_utilisateur']; ?></td>
                        <td><?php echo $emprunt['date_demande']; ?></td>
                        <td><?php echo $emprunt['date_emprunt']; ?></td>
                        <td>
                            <form method="POST" action="anemp.php">
                                <input type="hidden" name="id_emprunt" value="<?php echo $emprunt['id_emprunt']; ?>">
                                <button type="submit" class="btn btn-danger">Annuler</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <?php
    } else {
        echo "Aucun emprunt valide trouvé.";
    }
    ?>

<hr>
    <br>
    <br><hr>
   </div>

   
            <div id="plk">
            <?php
    // Inclusion du fichier de configuration
    include_once 'condb.php';

    // Récupération de la liste des emprunts en attente
    $query = "SELECT id_emprunt, id_livre, id_uti, date_demande, nom_utilisateur, prenom_utilisateur, nom_livre 
              FROM emprunts 
              WHERE statut='attente'";

    if ($stmt = mysqli_prepare($conn, $query)) {
        // Exécution de la requête
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Vérification s'il y a des emprunts en attente
        if(mysqli_num_rows($result) > 0) {
            ?>
                <h1>Liste des emprunts en attente</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID livre</th>
                            <th scope="col">Nom livre</th>
                            <th scope="col">Nom utilisateur</th>
                            <th scope="col">Prénom utilisateur</th>
                            <th scope="col">Date de demande</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher la liste des emprunts en attente
                        while($emprunt = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $emprunt['id_emprunt']; ?></td>
                                <td><?php echo $emprunt['id_livre']; ?></td>
                                <td><?php echo $emprunt['nom_livre']; ?></td>
                                <td><?php echo $emprunt['nom_utilisateur']; ?></td>
                                <td><?php echo $emprunt['prenom_utilisateur']; ?></td>
                                <td><?php echo $emprunt['date_demande']; ?></td>
                                <td>
                                    <form method="POST" action="val_emp.php">
                                        <input type="hidden" name="id_emprunt" value="<?php echo $emprunt['id_emprunt']; ?>">
                                        <button type="submit" class="btn btn-success">Valider</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "Aucun emprunt en attente.";
            echo "<hr>
<br>
<br><hr>";
        }
    } else {
        die("Erreur de requête SQL: " . mysqli_error($conn));
    }

    // Récupération de la liste des emprunts en retour
    // Récupération de la liste des emprunts en retour
    $query = "SELECT id_emprunt, id_livre, id_uti, date_retour, nom_utilisateur, prenom_utilisateur, nom_livre ,date_emprunt
              FROM emprunts 
              WHERE statut='retour'";

    if ($stmt = mysqli_prepare($conn, $query)) {
        // Exécution de la requête
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Vérification s'il y a des emprunts en retour
        if(mysqli_num_rows($result) > 0) {
            ?>
            
<hr>
<br>
<br><hr>
            <div id="plk1">
                <h1>Liste des emprunts en retour</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID livre</th>
                            <th scope="col">Nom livre</th>
                            <th scope="col">Nom utilisateur</th>
                            <th scope="col">Prénom utilisateur</th>
                            <th scope="col">Date d"Emprunt</th>
                            <th scope="col">Date de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher la liste des emprunts en retour
                        while($emprunt = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $emprunt['id_emprunt']; ?></td>
                                <td><?php echo $emprunt['id_livre']; ?></td>
                                <td><?php echo $emprunt['nom_livre']; ?></td>
                                <td><?php echo $emprunt['nom_utilisateur']; ?></td>
                                <td><?php echo $emprunt['prenom_utilisateur']; ?></td>
                                <td><?php echo $emprunt['date_emprunt']; ?></td>
                                <td><?php echo $emprunt['date_retour']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "Aucun emprunt en retour.";
        }
    } else {
        die("Erreur de requête SQL: " . mysqli_error($conn));
    }
    $query = "SELECT id_mes, email, mess FROM messa";

    if ($stmt = mysqli_prepare($conn, $query)) {
        // Exécution de la requête
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Vérification s'il y a des messages
        if(mysqli_num_rows($result) > 0) {
            ?>
            <div id="po">
                <h1>Liste des messages</h1>
                <table class="table2" id="table1" >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher la liste des messages
                        while($message = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $message['id_mes']; ?></td>
                                <td><?php echo $message['email']; ?></td>
                                <td><?php echo $message['mess']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "Aucun message trouvé.";
        }
    } else {
        die("Erreur de requête SQL: " . mysqli_error($conn));
    }
    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
?>

    



          
    
    <script src="bib/side/js/jquery.min.js"></script>
    <script src="bib/side/js/popper.js"></script>
    <script src="bib/side/js/bootstrap.min.js"></script>
    <script src="bib/side/js/main.js"></script>
</body>

</html>
