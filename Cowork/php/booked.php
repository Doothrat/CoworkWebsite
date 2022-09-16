<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php session_start(); ?>
    <meta charset="utf-8">
    <title>Réservation</title>
  </head>
  <body>
    <?php
    require '../include/header.php';
    include ('../include/connexion_bdd.php');
    $req = $bdd->prepare("SELECT * FROM booking");
    $req->execute();
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <table>
      <tr>
        <th>Id salle</th>
        <th>Heure de début</th>
        <th>Heure de fin</th>
        <th>Date</th>
        <th>Delete</th>
        <th></th>
      </tr>
    <?php
      foreach ($results as $key => $value) {
        echo "<tr>";
        echo "<td>". $value['Id_room'] ."</td>";
        echo "<td>". $value['Start_hour'] ."</td>";
        echo "<td>". $value['End_hour'] ."</td>";
        echo "<td>". $value['Date_booking'] ."</td>";
        echo '<td><a href="delete_booking.php?id='. $value['Id_booking'] .'>Suprimer</a></td>';
        echo "</tr>";
        }
        ?>
        </tr>
    </table>
  </body>
</html>
