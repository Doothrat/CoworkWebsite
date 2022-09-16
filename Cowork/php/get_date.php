<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>
    <?php
      session_start();
      if (isset($_GET['q']) AND !empty($_GET['q'])) {
        $room = $_GET['q'];
        $_SESSION['room'] = $room;

        $date = explode('-',date('d-m-y'));
        $_SESSION['today_date'] = $date;
    ?>

    <form>
      <select name="day" id="day">
        <option>Choisissez le jour :</option>
        <?php for($i = 1; $i <= 31; $i++){
          ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
      </select>
      <select name="month" id="month">
        <option>Choisissez le mois :</option>
        <?php for($i = 1; $i <= 12; $i++){
          ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
      </select>
      <select name="year" id="year">
        <option>Choissisez l'année :</option>
          <option value="20<?php echo $date['2']; ?>">20<?php echo $date['2']; ?></option>
          <option value="20<?php echo $date['2'] + 1; ?>">20<?php echo $date['2']+1; ?></option>
      </select>
      <input type="button" onclick="loadHour()" value="Valider">
    </form>

    <?php

      }else{
        echo '<p>non</p>';
      }
    ?>

  </body>
</html>
