<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <?php
      session_start();
      if(isset($_SESSION['id'])){
        header('Location: php/accueil.php');
      }
     ?>
  </head>
  <body>
    <h1>Bienvenue!</h1>
    <div>
      <form class="" action="php/connexion.php" method="post">
        <input type="text" name="mail" placeholder="Addresse email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
      </form>
    </div>
  </body>
</html>
