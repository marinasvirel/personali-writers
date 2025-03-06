<?php
require_once "writers-table.php";

$writer = selectById($link);

if (isset($_POST['update'])) {
  $id = $_GET['id'];

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $patronymic = $_POST['patronymic'];
  $date_birth = $_POST['date-birth'];
  $date_died = $_POST['date-died'];
  $biography = $_POST['biography'];
  $works = $_POST['works'];

  $query = "UPDATE writers SET `name`= '$name', `surname`= '$surname', `patronymic`= '$patronymic', `date-birth`= '$date_birth', `date-died`= '$date_died', `biography`= '$biography', `works`= '$works' WHERE `id` = '$id'";
  $res = mysqli_query($link, $query);
  header('Location: admin.php');
}
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
      <form action="" method="post">
        <input type="text" name="name" value="<?= $writer['name'] ?>" required>
        <input type="text" name="surname" value="<?= $writer['surname'] ?>" required>
        <input type="text" name="patronymic" value="<?= $writer['patronymic'] ?>" required>
        <input type="text" name="date-birth" value="<?= $writer['date-birth'] ?>" required>
        <input type="text" name="date-died" value="<?= $writer['date-died'] ?>" required>
        <textarea name="biography" id="" required><?= $writer['biography'] ?></textarea>
        <input type="text" name="works" value="<?= $writer['works'] ?>" required>
        <button type="submit" name="update">Редактировать</button>
      </form>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>