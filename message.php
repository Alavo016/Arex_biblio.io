<?php
include 'condb.php';

if(isset($_POST["sun"])){
  $email = $_POST['Email'];
  $mes = $_POST['mess'];
  
 

  // Vérification des champs obligatoires
  if(!empty($_POST['Email']) && !empty($_POST['mess'])){
    
    $add_user_query = "INSERT INTO messa (email,mess) VALUES ('$email',  '$mes')";  
    $add_user_result = mysqli_query($conn, $add_user_query);
    if($add_user_result){
      header('Location: index.html');
    }
  }
  
  
}
 
?>