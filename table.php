<?php
require_once "writers-table.php";
?>
<a href="create.php">Добавить писателя</a>
<table>
  <th>id</th>
  <th>Имя</th>
  <th>Фамилия</th>
  <th>Отчество</th>
  <th>Дата рождения</th>
  <th>Дата смерти</th>
  <th>Изображение</th>
  <th>Биография</th>
  <th>Произведения</th>
  <?php foreach ($writers as $key => $value): ?>
    <tr>
      <td><?= $value['id'] ?></td>
      <td><?= $value['name'] ?></td>
      <td><?= $value['surname'] ?></td>
      <td><?= $value['patronymic'] ?></td>
      <td><?= $value['date-birth'] ?></td>
      <td><?= $value['date-died'] ?></td>
      <td><?= $value['file'] ?></td>
      <td><?= $value['biography'] ?></td>
      <td><?= $value['works'] ?></td>
      <td><a href="update.php?id=<?= $value['id'] ?>" class="link">Редактировать</a></td>
      <td><a href="delete.php?id=<?= $value['id'] ?>" class="link">Удалить</a></td>
    </tr>
  <?php endforeach; ?>
</table>