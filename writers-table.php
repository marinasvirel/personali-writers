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

function selectById($link)
{
  if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM writers WHERE `id`= '$id'";
    $res = mysqli_query($link, $query);
    return mysqli_fetch_assoc($res);
  }
}




