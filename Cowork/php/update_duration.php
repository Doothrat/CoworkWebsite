<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script type="text/javascript">
    function UpdateDuration() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("form").innerHTML =
          this.responseText;
        }
      };
      var year = document.getElementById("Start_hour");
      xhttp.open("GET", "update_duration.php", true);
      xhttp.send();
    }
  </script>
  </head>
  <body>
    <?php
      session_start();
      include ('../include/connexion_bdd.php');
    if (isset($_GET['sh']) OR !empty($_GET['sh'])) {
        $startHour = $_GET['sh'];
        if ($startHour != 19) {


    ?>
          <option>Choisissez la durée</option>
          <option value="1">1 heure</option>
          <option value="2">2 heures</option>
    <?php
  }else {?>
    <option>Choisissez la durée</option>
    <option value="1">1 heure</option>
  <?php }
      }else{
        echo '<p>non</p>';
      }
    ?>

  </body>
</html>
