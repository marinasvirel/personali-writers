<?php
if (isset($_POST['login']) and isset($_POST['password'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];

  if ($login == "admin" and $password == "root") {
    setcookie('login', $login, 0, '/');
    header("Location: admin.php");
  }
}
