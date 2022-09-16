<?php
  session_start();

  include ('../include/connexion_bdd.php');
  $req = 'DELETE FROM FIELD_EXA WHERE idExam = ?';
  $req->execute([$_GET["id"]]);
 ?>
