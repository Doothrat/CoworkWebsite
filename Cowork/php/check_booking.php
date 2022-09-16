<?php
session_start();
include ('../include/connexion_bdd.php');
if (isset($_POST['Start_hour']) AND !empty($_POST['Start_hour']) AND isset($_POST['Duration']) AND !empty($_POST['Duration'])) {

  $Start_hour = $_POST['Start_hour'] . ':00:00';
  $End_hour = $_POST['Start_hour']+2 . ':00:00';

  $requser = $bdd->prepare("SELECT * FROM booking");
  $requser->execute();
  $booking_res = $requser->fetchAll(PDO::FETCH_ASSOC);

  $check;

  if ($_SESSION['date_booking'] > date()) {
    $check = 0;
    header('Location: erreur_booking.php');
  }

  foreach ($booking_res as $value) {
    if($value['Id_room'] == $_SESSION['room'] AND $_SESSION['date_booking'] == $_SESSION['today_date'] AND ($Start_hour >= $value['Start_hour'] AND $Start_hour < $value['End_hour']) AND ($End_hour >= $value['Start_hour'] AND $End_hour < $value['End_hour'])){
      $check = 0;
      exit;
    }else{
      $check = 1;
    }
  }



  if ($check == 1) {
    $requser = $bdd->prepare("INSERT INTO booking (Id_room, Start_hour, End_hour, Date_booking) VALUES (:val1,:val2,:val3,:val4)");
    $requser->execute([
      "val1"=>$_SESSION['room'],
      "val2"=>$Start_hour,
      "val3"=>$End_hour,
      "val4"=>$_SESSION['date_booking']
    ]);
    header('Location: validate_booking.php');
  }else {
    header('Location: erreur_booking.php');
  }
}
 ?>
