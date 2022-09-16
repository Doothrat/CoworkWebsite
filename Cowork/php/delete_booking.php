<?php
  include ('../include/connexion_bdd.php');
  $q = "DELETE FROM booking WHERE Id_booking = ?";
  $req = $bdd->prepare($q);
  $results = $req->execute([$_GET["id"]]);

  header('Location: manage_booking.php?success');
 ?>
