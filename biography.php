<?php
require_once "writers-table.php";

$writer = selectById($link);

?>

<!DOCTYPE html>
<html lang="ru">

<?php
require_once "base/head.php";
?>

<body>
  <?php require_once "base/header.php" ?>
  <main>
    <div class="container">
      <div class="biography">
        <div class="biography-base">
          <div class="biography-photo-frame">
            <img class="biography-photo" src="uploads/<?= $writer['file'] ?>" alt="biography-photo">
          </div>
          <h2><?= "{$writer['name']} {$writer['patronymic']} {$writer['surname']}" ?></h2>
          <p class="biography-date">1895 — 1925гг.</p>
        </div>
        <div class="biography-text">
          <?= $writer['biography'] ?>
        </div>
      </div>
      <h3>Произведения</h3>
      <ul class="works">
        <?php
        $works = explode("; ", $writer['works']);
        foreach ($works as $key => $value) {
          echo "<li>«{$value}»</li>";
        }
        ?>
      </ul>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>