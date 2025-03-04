<?php
require_once "db.php";

$id = $_GET['id'];
$query = "SELECT * FROM writers WHERE `id`= '$id'";
$res = mysqli_query($link, $query);
$writer = mysqli_fetch_assoc($res);

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
            <img class="biography-photo" src="img/esenin.jpg" alt="biography-photo">
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
        <li>«Алый мрак в небесной черни...»</li>
        <li>Бабушкины сказки («В зимний вечер по задворкам...»)</li>
      </ul>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>