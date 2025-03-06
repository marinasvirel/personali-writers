<?php

function validation($pattern, $condition, $post)
{
  $result = "";
  if (isset($_POST[$post])) {
    $input = $_POST[$post];
    if (!empty($input)) {
      if (preg_match($pattern, $input) == 0) {
        $result = $condition;
      } else {
        $result = "<span class='info-span-valid'>&#10004;</span>";
      }
    } else {
      $result = "Заполните поле";
    }
  }
  return $result;
}

function validName($post)
{
  return validation("#^[А-ЯЁ][а-яё][а-яёА-ЯЁ\- ]*$#u", "Только буквы кириллические. Строка начинается с прописной буквы. Не менее двух символов. Допускаются пробелы и дефисы", $post);
}

function validBiograhy($post)
{
  return validation('#^[А-ЯЁ][а-яёА-ЯЁ0-9\-\?\!\.\,\"\:\; ]*$#u', "Только буквы кириллические. Строка начинается с прописной буквы. Не менее двух символов. Допускаются пробелы, дефисы, кавычки, точки, запятые, двоеточия, точки с запятой, восклицательный и вопросительный знак", $post);
}

function validDate($post)
{
  $result = "";
  if (isset($_POST[$post])) {
    $input = $_POST[$post];
    if (empty($input)) {
      $result = "Выберите дату";
    } else {
      $result = "<span class='info-span-valid'>&#10004;</span>";
    }
  }
  return $result;
}

function validFile()
{
  $result = "";
  if (isset($_FILES['file'])) {
    if (empty($_FILES['file']['name'])) {
      $result = "Загрузите изображение";
    } else {
      $result = "<span class='info-span-valid'>&#10004;</span>";
    }
  }
  return $result;
}

function validWork()
{
  $result = "";
  $pattern = '#^[А-ЯЁ][а-яёА-ЯЁ\-\?\!\.\, ]*$#u';
  $condition = "Только буквы кириллические. Строка начинается с прописной буквы. Не менее двух символов. Допускаются пробелы, дефисы, точки, запятые, восклицательный и вопросительный знак";
  if (isset($_POST['works'])) {
    $variable = $_POST['works'];
    $arr = [];
    foreach ($variable as $key => $value) {
      if (preg_match($pattern, $value) == 0) {
        $arr[] = $condition;
      } else {
        $arr[] = "ok";
      }
    }
    if (in_array($condition, $arr)) {
      $result = $condition;
    } else {
      $result = "<span class='info-span-valid'>&#10004;</span>";
    }
  }
  return $result;
}

$name_span = validName('name');
$surname_span = validName('surname');
$patronymic_span = validName('patronymic');
$date_birth_span = validDate("date-birth");
$date_died_span = validDate("date-died");
$file_span = validFile();
$biography_span = validBiograhy("biography");
$works_span = validWork();

$fields = [
  $name_span,
  $surname_span,
  $patronymic_span,
  $date_birth_span,
  $date_died_span,
  $file_span,
  $biography_span,
  $works_span,
];

$valid = false;
if (count(array_unique($fields)) == 1 and $fields[0] == "<span class='info-span-valid'>&#10004;</span>") {
  $valid = true;
}
