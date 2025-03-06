<?php
require_once "validation.php";
require_once "db.php";

$name = $_POST['name'] ?? "";
$surname = $_POST['surname'] ?? "";
$patronymic = $_POST['patronymic'] ?? "";
$date_birth = $_POST['date-birth'] ?? "";
$date_died = $_POST['date-died'] ?? "";
$biography = $_POST['biography'] ?? "";

if ($valid == true) {
  $works = implode('; ', $_POST['works']);
  $file = $_FILES['file']['name'];
  $tmp_file = $_FILES['file']['tmp_name'];

  move_uploaded_file($tmp_file, "uploads/$file");

  $query = "INSERT INTO `writers`(`name`, `surname`, `patronymic`, `date-birth`, `date-died`, `file`, `biography`, `works`) VALUES ('$name', '$surname', '$patronymic', '$date_birth', '$date_died', '$file', '$biography', '$works')";
  mysqli_query($link, $query);
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
      <h2>Информация о писателе</h2>
      <?php require_once "create-form.php" ?>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>