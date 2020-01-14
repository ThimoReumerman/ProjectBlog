<?php
if(isset($_POST["submit"])) {
  //Pak titel en inhoud
  $titel =  str_replace(PHP_EOL, "<br />", htmlspecialchars($_POST["titel"]));;
  $inhoud = str_replace(PHP_EOL, "<br />", htmlspecialchars($_POST["inhoud"]));

  //Maak de sessie en pak de username
  session_start();
  $user = $_SESSION["USERNAME"];

  //Maak de nieuwe blogpost tekst
  $nieuw = "$user||$titel||$inhoud\n";

  //Zet de nieuwe post aan het begin van het bestand
  $file_data = $nieuw;
  $file_data .= file_get_contents("../txt/blogposts.txt");
  file_put_contents("../txt/blogposts.txt", $file_data);

  //Maak een alert aan en ga terug naar de posts
  echo"<script>alert('Blogpost aangemaakt.'); location.href = 'blog.php';</script>";
}
?>
