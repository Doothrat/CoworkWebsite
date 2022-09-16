<header>
  <nav id="header">
    <a href="../index.php"><img src="img/logo.png" alt="logo"></a>
    <?php
    if (isset($_SESSION["role"])) {
      if ($_SESSION["role"] == '0') {
        echo "<a href='booking.php'>Réserver</a>";
      }
    }
    if (isset($_SESSION["role"])) {
      if ($_SESSION["role"] == '1') {
        echo "<a href='booked.php'>Réservation</a>";
      }
    }
    ?>
  </nav>
  </header>
