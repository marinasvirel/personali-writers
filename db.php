<?php
// Подключение к базе
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$name = 'personaly-writers';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);