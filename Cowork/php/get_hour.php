<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <?php
      session_start();
      include ('../include/connexion_bdd.php');
    if (isset($_GET['d']) AND !empty($_GET['d']) AND isset($_GET['m']) AND !empty($_GET['m']) AND isset($_GET['y']) AND !empty($_GET['y'])) {
        $day = $_GET['d'];
        $_SESSION['day'] = $day;
        $month = $_GET['m'];
        $_SESSION['month'] = $month;
        $year = $_GET['y'];
        $_SESSION['year'] = $year;
        $date = $year . '-' . $month . '-' . $day;
        $_SESSION['date_booking'] = $date;

        $requser = $bdd->prepare("SELECT Start_hour,End_hour FROM booking WHERE Date_booking = ?");
        $requser->execute([$date]);
        $results = $requser->fetchAll(PDO::FETCH_ASSOC);


    ?>

    <form action="check_booking.php" method="post">
      <select name="Start_hour" id="Start_hour" onchange="UpdateDuration(this.value)">
        <option>Choisissez l'heure d'arrivée :</option>
        <?php for($i = 8; $i <= 19; $i++){
              foreach ($results['Start_hour'] as $value) {
                $check = 0;
                $var = explode(":",$value);
                if((int) $var['0'] == $i){
                  $check = 1;
                }
              }
              if ($check == 0) {
                ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php
              }
                   } ?>
      </select>
      <select name="Duration" id="Duration">
        <option>Choisissez la durée</option>
      </select>
      <input type="submit" value="Valider">
    </form>

    <?php

      }else{
        echo '<p>non</p>';
      }
    ?>

  </body>
</html>
