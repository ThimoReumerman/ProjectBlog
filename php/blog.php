<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>

  <body>
    <h3>Welkom!</h3>
    <fieldset>
      <legend>Nieuwe blogpost</legend>
      <form name="blogpost" method="post" enctype="multipart/form-data" action="post.php">
        <input required type="text" name="titel" placeholder="Titel" /><br />
        <textarea required id="inhoud" name="inhoud" placeholder="Inhoud"></textarea><br />
        <input id="verzenden" type="submit" name="submit" />
      </form>
    </fieldset>
  </body>
</html>

<?php
  $bestand = fopen("../txt/blogposts.txt", "r");

  if($bestand) {
    while (!feof($bestand)) {
      $curpost = fgets($bestand);
      $curpost = explode("||", $curpost);

      if($curpost[0] != "") {
        echo "<h4>$curpost[0]</h4>$curpost[1]<br />$curpost[2]";
      }

    }
  }

  fclose($bestand);
?>
