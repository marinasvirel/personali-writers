<?php
require_once "db.php";

$id = $_GET['id'];

$query = "DELETE FROM `writers` WHERE `id`= '$id'";
$res = mysqli_query($link, $query);
header('Location: /');
