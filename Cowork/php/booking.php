<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Réservation</title>
    <?php session_start() ?>
    <script>
      function loadRoom(place) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "get_rooms.php?q="+place, true);
        xhttp.send();
      }
      function loadDate(room) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "get_date.php?q="+room, true);
        xhttp.send();
      }
      function loadHour() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form").innerHTML =
            this.responseText;
          }
        };
        var year = document.getElementById("year").value;
        var month = document.getElementById("month").value;
        var day = document.getElementById("day").value;
        xhttp.open("GET", "get_hour.php?d="+day+"&m="+month+"&y="+year, true);
        xhttp.send();
      }
      function UpdateDuration(Start_hour) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Duration").innerHTML =
            this.responseText;
          }
        };
        var year = document.getElementById("Start_hour");
        xhttp.open("GET", "update_duration.php?sh="+Start_hour, true);
        xhttp.send();
      }
    </script>

  </head>
  <body>
    <?php require '../include/header.php'; ?>
    <div id="form">
      <form>
        <select name="place" onchange="loadRoom(this.value)">
          <option>Choisissez le batiment :</option>
          <option value="1">2 rue michalak</option>
          <option value="2">3 avenue lemoine</option>
        </select>
      </form>
    </div>
  </body>
</html>
