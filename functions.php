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
  return validation('#^[А-ЯЁ][а-яё][а-яёА-ЯЁ\-\?\!\.\,\"\:\; ]*$#u', "Только буквы кириллические. Строка начинается с прописной буквы. Не менее двух символов. Допускаются пробелы, дефисы, кавычки, точки, запятые, двоеточия, точки с запятой, восклицательный и вопросительный знак", $post);
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
