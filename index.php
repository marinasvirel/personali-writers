<!DOCTYPE html>
<html lang="ru">

<?php
require_once "base/head.php";
?>

<body>
  <?php require_once "base/header.php" ?>
  <main>
    <div class="container">
      <?php require_once "writers-table.php";?>
      <h1>Биографии писателей</h1>
      <ul class="writers">
        <?php foreach ($writers as $key => $value): ?>
          <li>
            <?= "{$value['name']}&nbsp;{$value['surname']}" ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>