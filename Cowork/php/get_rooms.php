<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <?php
      session_start();
      unset($_SESSION['place']);
      unset($_SESSION['room']);
      unset($_SESSION['day']);
      unset($_SESSION['month']);
      unset($_SESSION['year']);
      unset($_SESSION['hour']);
      include ('../include/connexion_bdd.php');
      if (isset($_GET['q']) AND !empty($_GET['q'])) {
        $place = $_GET['q'];
        $_SESSION['place'] = $place;


        $req = $bdd->prepare("SELECT * FROM room WHERE Id_place = ?");
        $req->execute([$place]);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <form>
      <select name="place" onchange="loadDate(this.value)">
        <option>Choissisez la salle :</option>
        <?php foreach ($results as $value): ?>
          <option value="<?php echo $value['Id_room']; ?>"><?php echo $value['Name']; ?></option>
        <?php endforeach; ?>
      </select>
    </form>


    <?php

      }else{
        echo '<p>non</p>';
      }
    ?>

  </body>
</html>
