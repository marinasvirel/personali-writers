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
        $result = "ok";
      }
    } else {
      $result = "пустая строка";
    }
  }
  return $result;
}

function validName($name)
{
  return validation("#^[А-ЯЁ][а-яё][а-яёА-ЯЁ\- ]*$#u", "Только буквы кириллические. Без пробелов. Строка начинается с прописной буквы. Не менее двух символов", $name);
}
