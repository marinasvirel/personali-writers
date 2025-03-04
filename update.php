<?php
require_once "writers-table.php";
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
      <table>
        <th>id</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Дата смерти</th>
        <th>Изображение</th>
        <th>Произведения</th>
        <th>Биография</th>
        <?php foreach ($writers as $key => $value): ?>
        <tr>
          <td><?= $value['id'] ?></td>
          <td><?= $value['name'] ?></td>
          <td><?= $value['surname'] ?></td>
          <td><?= $value['patronymic'] ?></td>
          <td><?= $value['date-birth'] ?></td>
          <td><?= $value['date-died'] ?></td>
          <td><?= $value['file'] ?></td>
          <td><?= $value['works'] ?></td>
          <td><?= $value['biography'] ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <a href="create.php" class="link">Создать</a>
    </div>
  </main>
  <?php require_once "base/footer.php" ?>

</body>

</html>