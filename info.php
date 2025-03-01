<?php

require_once "functions.php";

$name_span = validName('name');
$surname_span = validName('surname');


//var_dump();
var_dump($_POST)
?>
<form class="info" action="" method="post" enctype="multipart/form-data">
  <span class="info-span"><?= $name_span ?></span>
  <input type="text" name="name" placeholder="Имя">
  <span class="info-span"><?= $surname_span ?></span>
  <input type="text" name="surname" placeholder="Фамилия">
  <input type="text" name="patronymic" placeholder="Отчество">
  <input type="text" name="date-birth" placeholder="Дата рождения дд.мм.гггг">
  <input type="text" name="date-died" placeholder="Дата смерти дд.мм.гггг">
  <div class="file-container">
    <input type="file" id="file">
    <label for="file" id="for-file">Изображение писателя</label>
  </div>
  <textarea name="biography" id="" placeholder="Биография"></textarea>
  <div id="fieldList">
    <div class="field-container">
      <input type="text" name="field[]" placeholder="Произведение">
    </div>
  </div>
  <button type="button" id="addFieldBtn">Добавить произведение</button>
  <button type="submit">Опубликовать</button>
</form>

<script>
  // Добавление полей
  document.getElementById('addFieldBtn').addEventListener('click', function() {
    const fieldList = document.getElementById('fieldList');
    const newFieldContainer = document.createElement('div');
    newFieldContainer.className = 'field-container';
    newFieldContainer.innerHTML = `
            <input type="text" name="field[]" placeholder="Произведение" required>
            <button type="button" class="remove-btn"></button>
        `;
    fieldList.appendChild(newFieldContainer);
  });

  document.getElementById('fieldList').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-btn')) {
      e.target.parentElement.remove();
    }
  });


  // Добавление изображения
  const input = document.getElementById('file');
  const labelFile = document.getElementById('for-file');

  function updateImage() {
    labelFile.innerText = this.files[0]['name'];
    labelFile.style.color = "#513013";
  }

  input.addEventListener('change', updateImage);
</script>