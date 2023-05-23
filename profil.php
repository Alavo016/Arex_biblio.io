<!DOCTYPE html>
<html>
<head>
	<title>Mon site</title>
    <link rel="stylesheet" href="css/cole.css">
    <link rel="shortcut icon" type="image/x-icon" href="media/logo.png" />
</head>
<body id="cole">
	<h1>Informations utilisateur</h1>
<?php
// Connexion à la base de données avec PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblio";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération de l'ID de l'utilisateur connecté
    session_start();
    $id_uti = $_SESSION["id_uti"];

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $conn->prepare("SELECT nom, prenom, email, tel, anni, dateenr FROM utilisateur WHERE id_uti = :id_uti");
    $stmt->bindParam(':id_uti', $id_uti);
    $stmt->execute();

    // Vérification du résultat
    if ($stmt->rowCount() > 0) {
        // Récupération des données de l'utilisateur
        $row = $stmt->fetch();
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $email = $row["email"];
        $tel = $row["tel"];
        $anni = $row["anni"];
        $dateen = $row["dateenr"];
    } else {
        header('Location: recon.php');
        exit();
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// Fermeture de la connexion
$conn = null;
?>

<div class="user-info">
    <h2>Nom complet</h2>
    <ul>
        <li><strong>Nom :</strong> <?php echo $prenom; ?></li>
        <li><strong>Prénom :</strong> <?php echo $nom; ?></li>
        <li><strong>Email :</strong> <?php echo $email; ?></li>
        <li><strong>Téléphone :</strong> <?php echo $tel; ?></li>
    </ul>
    <h2>Informations personnelles</h2>
    <ul>
        <li><strong>Date de naissance :</strong> <?php echo $anni; ?></li>
        <li><strong>Date d'inscription :</strong> <?php echo $dateen; ?></li>
    </ul>
</div>


<div class="historique-emprunts">
  <h2>Historique d'emprunts</h2>
  <?php
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=biblio", "root", "");

    // Requête SQL pour récupérer les demandes dont le statut est "retourné"
    $sql = "SELECT id_emprunt, id_livre, date_emprunt, nom_livre, statut, date_retour FROM emprunts WHERE id_uti = $id_uti AND statut = 'retour' ORDER BY date_retour DESC";
    $resultat = $connexion->query($sql);

    // Vérifier s'il y a des emprunts retournés
    $nombre_emprunts = $resultat->rowCount();

    // Affichage des résultats sous forme de tableau HTML si des emprunts ont été trouvés, sinon afficher un message approprié
    if($nombre_emprunts > 0) {
      echo "<table>
            <tr>
              <th>ID Emprunt</th>
              <th>ID Livre</th>
              <th>Titre du livre</th>
              <th>Date d'emprunt</th>
              <th>Statut</th>
              <th>Date de retour</th>
              <th></th>
            </tr>";
      foreach($resultat as $row) {
        echo "<tr>
                <td>".$row['id_emprunt']."</td>
                <td>".$row['id_livre']."</td>
                <td>".$row['nom_livre']."</td>
                <td>".$row['date_emprunt']."</td>
                <td>".$row['statut']."</td>
                <td>".$row['date_retour']."</td>
                <td>
                  <form method='post' action=''>
                    <input type='hidden' name='id_emprunt' value='".$row['id_emprunt']."'>
                    <button type='submit' name='emprunter' class='btn-emprunter' >Je veux emprunter</button>
                  </form>
                </td>
              </tr>";
      }
      echo "</table>";

      // Traitement de la soumission du formulaire
      if(isset($_POST['emprunter'])){
        $id_emprunt = $_POST['id_emprunt'];
    
        // Requête SQL pour mettre à jour le statut de la demande d'emprunt
        $sql = "UPDATE emprunts SET statut = 'attente', date_demande = NOW(), date_emprunt = '0000-00-00', date_retour = '0000-00-00' WHERE id_emprunt = $id_emprunt";
        $resultat = $connexion->query($sql);
    
    

        if($resultat){
          header('Location: profil.php');
        }
        else{
          echo "<p>Erreur lors de la mise à jour du statut de la demande d'emprunt.</p>";
        }
      }
    }
    else {
      echo "<p>Aucun livre retourné.</p>";
    }
  ?>
</div>


<br>
<hr>
<br>


<div class="historique-emprunts">
  <h2>Liste d'Emprunt</h2>
  <?php
  // Connexion à la base de données
  $connexion = new PDO("mysql:host=localhost;dbname=biblio", "root", "");

  // Requête SQL pour récupérer les demandes dont le statut est "valide"
  $sql = "SELECT * FROM emprunts WHERE id_uti = $id_uti AND statut = 'valide' ORDER BY date_retour DESC";
  $resultat = $connexion->query($sql);

  // Affichage des résultats sous forme de tableau HTML
  if($resultat->rowCount() > 0) {
    echo "<table>
          <tr>
            <th>ID Emprunt</th>
            <th>ID Livre</th>
            <th>Date d'emprunt</th>
            <th>Nom du livre</th>
            <th>Statut</th>
            <th></th>
          </tr>";
    foreach($resultat as $row) {
      echo "<tr>
              <td>".$row['id_emprunt']."</td>
              <td>".$row['id_livre']."</td>
              <td>".$row['date_emprunt']."</td>
              <td>".$row['nom_livre']."</td>
              <td>".$row['statut']."</td>
              <td>
                <form method='post' action=''>
                  <input type='hidden' name='id_emprunt' value='".$row['id_emprunt']."'>
                  <button type='submit' name='retour' class='btn-retour'>Retourné le livre</button>
                </form>
              </td>
            </tr>";
    }
    echo "</table>";

    // Traitement de la demande de retour de livre
    if(isset($_POST['retour'])) {
      $id_emprunt = $_POST['id_emprunt'];
      $sql = "UPDATE emprunts SET statut = 'retour', date_retour = NOW() WHERE id_emprunt = $id_emprunt";
      $resultat = $connexion->query($sql);
      // Message de confirmation
      echo "La demande d'emprunt a été mise à jour avec succès.";
    
      
    }
  } else {
    echo "<p>Aucun emprunt en cours pour le moment.</p>";
  }
  ?>
</div>



<br>
<hr>
<br>
<div class="historique-emprunts" >
<h2>Liste de demande </h2>
<?php
  // Connexion à la base de données
  $connexion = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
// Requête SQL pour récupérer les demandes d'emprunt en attente
$sql = "SELECT * FROM emprunts WHERE id_uti = $id_uti AND statut = 'attente' ORDER BY date_demande DESC";
$resultat = $connexion->query($sql);

// Affichage des résultats sous forme de tableau HTML
if($resultat->rowCount() > 0) {
  echo "<h2>Demandes d'emprunt en attente</h2>
        <table>
          <tr>
            <th>ID de l'emprunt</th>
            <th>Titre du livre</th>
            <th>Date de la demande</th>
            <th>Statut</th>
            <th></th>
          </tr>";
  foreach($resultat as $row) {
    echo "<tr>
            <td>".$row['id_emprunt']."</td>
            <td>".$row['nom_livre']."</td>
            <td>".$row['date_demande']."</td>
            <td>".$row['statut']."</td>
            <td>
              <form method='post' action=''>
                <input type='hidden' name='id_emprunt' value='".$row['id_emprunt']."'>
                <button type='submit' name='annuler' class='btn-annuler'>Annuler</button>
              </form>
            </td>
          </tr>";
  }
  echo "</table>";
  // Traitement des demandes d'annulation d'emprunt en attente
if(isset($_POST['annuler'])) {
$id_emprunt = $_POST['id_emprunt'];
$sql = "DELETE FROM emprunts WHERE id_emprunt = $id_emprunt";
$resultat = $connexion->query($sql);
// Message de confirmation
echo "<p>Votre demande d'emprunt a été annulée.</p>";
}

// Fermeture de la connexion à la base de données
$connexion = null;

} else {
  echo "<p>Aucune demande d'emprunt en attente.</p>";
}
?>
</div>

<form method="post" action="deco.php">
  <button type="submit" id="deco" >Déconnexion</button>
</form>



</div>
</body>
</html>
