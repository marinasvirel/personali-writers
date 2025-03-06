<!DOCTYPE html>
<html lang="ru">

<?php
require_once "base/head.php";
?>

<body>
  <?php require_once "base/header.php" ?>
  <main>
    <div class="container">
      <?php
      if (array_key_exists('login', $_COOKIE)) {
        require_once "table.php";
      } else {
        require_once "auth-form.php";
      }

      // var_dump(array_key_exists('login', $_COOKIE));
      ?>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>