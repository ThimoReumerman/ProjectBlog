<!-- THIMO REUMERMAN 97050932 -->
<?php
  if (isset($_POST["registreren"])) {
    //Maak foto variable
    $fotoNaam = basename($_FILES["foto"]["name"]);
    global $uploadsMap;

    function upload() {
      //Zet uploads map
      global $uploadsMap;
      $uploadsMap = "../uploads/";
      $uploadsMap = $uploadsMap . basename($_FILES["foto"]["name"]);
      $fotoType = strtolower(pathinfo($uploadsMap, PATHINFO_EXTENSION));


      //Controleer of deze foto al bestaat
      if (file_exists($uploadsMap)) {
        echo "Deze foto bestaat al.<br />";
        return false;
      }

      //Valideer fotoSize
      if ($_FILES["foto"]["size"] > 4000000) {
        echo "Deze foto is te groot.<br />";
        return false;
      }

      //Valideer formaat
      if ($fotoType != "jpg" && $fotoType != "png" && $fotoType != "jpeg" && fotoType != "gif") {
        echo "Foto moet jpg, jpeg, png of gif zijn.<br />";
        return false;
      }

      return true;
    }

    //Verplaats foto van temp-map naar uploadsMap
    if (upload()) {
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadsMap)) {
        echo "Foto is geupload.<br />";

        //Gebruiker opslaan
        $bestand = fopen("../txt/users.txt", "ab");

        //Kijk of bestand bestaat
        if (!$bestand) {
          echo "Kon geen bestand openen!<br />";
        }

        //Maak gebruiker variablen
        $naam = htmlspecialchars($_POST["naam"]);
        $email = htmlspecialchars($_POST["email"]);
        $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
        $profielFoto = $fotoNaam;
        $profiel = $naam . "*" . $email . "*" . $wachtwoord . "*" . $profielFoto . "\n";

        fwrite($bestand, $profiel, strlen($profiel));

        if(fclose($bestand)) {
          echo "Account is aangemaakt.<br />";
        } else {
          echo "Kon bestand niet afsluiten.<br />";
        }
      } else {
        echo "Probleem bij het uploaden. Foto niet geupload.<br />";
      }
    }
  }
?>

<a href="../html/register.html">
  <input type="button" name="terug" value="Terug" />
</a>
