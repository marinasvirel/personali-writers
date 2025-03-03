<?php
require_once "db.php";

function select_writers($link)
{
  $query = "SELECT * FROM `writers`";
  $res = mysqli_query($link, $query);
  for ($writers = []; $row = mysqli_fetch_assoc($res); $writers[] = $row);
  return $writers;
}

$writers = select_writers($link);

// echo "<pre>";
// print_r($writers);
?>

<h1>Биографии писателей</h1>
<ul class="writers">
  <?php foreach ($writers as $key => $value): ?>
    <li><?= "{$value['name']}&nbsp;{$value['surname']}" ?></li>
 <?php endforeach; ?>
</ul>