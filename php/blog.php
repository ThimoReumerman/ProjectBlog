<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/styles.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <!-- HEADER -->
    <header><h1>ROME</h1></header>

    <!-- FORMULIER -->

      <form id="blogpost" name="blogpost" method="post" enctype="multipart/form-data" action="post.php">
        <h3>Nieuwe blogpost</h3>
        <input required type="text" name="titel" placeholder="Titel" /><br />
        <textarea required id="inhoud" name="inhoud" placeholder="Inhoud"></textarea><br />
        <input id="verzenden" type="submit" name="submit" />
      </form>

  </body>
</html>

<?php
  $bestand = fopen("../txt/blogposts.txt", "r");

  if($bestand) {
    while (!feof($bestand)) {
      $curpost = fgets($bestand);
      $curpost = explode("||", $curpost);

      if(sizeof($curpost) > 1) {
        echo "<div class='blogpost'>
        <div class='profileinfo'>
          <div class='image'><img src='../uploads/$curpost[3]' alt='Profielfoto' width='75' height='75' /></div>
          <div class='name'>$curpost[0]</div>
        </div>
        <div class='titel'>$curpost[1]</div><br />
        <div class='inhoud'>$curpost[2]</div><br />
        </div>";
      }

    }
  }

  fclose($bestand);
?>
