<?php
  $email = htmlspecialchars($_POST["email"]);
  $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
  $bestand = fopen("../txt/users.txt", "r");

  if (!$bestand) {
    echo "Kon geen bestand openen!";
  }

  while (!feof($bestand)) {
    $account = fgets($bestand);
    $account = explode("*", $account);

    if($account[1] == $email && $account[2] == $wachtwoord) {
      session_start();
      $_SESSION["USER"] = $email;
      $_SESSION["USERNAME"] = $account[0];
      $_SESSION["STATUS"] = 1;
      $_SESSION["ID"] = $_COOKIE["PHPSESSID"];

      echo "
        <script>
          alert('U bent ingelogd als $email.');
          location.href='blog.php';
        </script>
      ";
    }
  }

  echo "
    <script>
      alert('Wachtwoord of gebruikersnaam ongeldig.');
      location.href='../html/login.html';
    </script>
  ";
?>
