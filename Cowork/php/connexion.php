<?php
  include ('../include/connexion_bdd.php');
  if (isset($_POST['mail'], $_POST['password']) AND !empty($_POST['mail']) AND !empty($_POST['password'])) {
    $email = htmlspecialchars(urldecode($_POST['mail']));
    $password = htmlspecialchars($_POST['password']);


    $req = $bdd->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $req->execute([$email, $password]);
    $results = $req->fetch(PDO::FETCH_ASSOC);


    if($results!=null){
      session_start();
      $_SESSION['id'] = $results['Id'];
      $_SESSION['role'] = $results['Role'];
      header('Location: accueil.php');
    }else{
      echo "L'utilisateur n'existe pas.";
    }
  }
?>
