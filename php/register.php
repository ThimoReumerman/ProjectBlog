<?php
  if (isset($_POST["submit"])) {

    $file = fopen("../txt/users.txt", "a");
    $fullname = htmlspecialchars($_POST["fullname"]);
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $user = $fullname . "|" . $username . "|" . $email . "|" . $password . "\n";

    echo "$fullname <br />";
    echo "$username <br />";
    echo "$email <br />";
    echo "$password <br />";
    echo $user;


    fwrite($file, $user, strlen($user));
  }
?>
