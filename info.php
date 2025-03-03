<?php
require_once "functions.php";

function validWork(){}

$name_span = validName('name');
$surname_span = validName('surname');
$patronymic_span = validName('patronymic');
$date_birth_span = validDate("date-birth");
$date_died_span = validDate("date-died");
$file_span = validFile();
$biography_span = validBiograhy("biography");

// var_dump();
?>
<h2>Информация о писателе</h2>
<form class="info" action="" method="post" enctype="multipart/form-data">
  <span class="info-span"><?= $name_span ?></span>
  <input type="text" name="name" placeholder="Имя">
  <span class="info-span"><?= $surname_span ?></span>
  <input type="text" name="surname" placeholder="Фамилия">
  <span class="info-span"><?= $patronymic_span ?></span>
  <input type="text" name="patronymic" placeholder="Отчество">
  <span class="info-span"><?= $date_birth_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;рождения:</p>
    <input type="date" name="date-birth" id="date-birth">
  </div>
  <span class="info-span"><?= $date_died_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;смерти:</p>
    <input type="date" name="date-died" id="">
  </div>
  <span class="info-span"><?= $file_span ?></span>
  <div class="file-container">
    <input type="file" id="file" name="file">
    <label for="file" id="for-file">Изображение писателя</label>
  </div>
  <span class="info-span"><?= $biography_span ?></span>
  <textarea name="biography" id="" placeholder="Биография"></textarea>
  <div id="workList">
    <div class="work-container">
      <input type="text" name="works[]" placeholder="Произведение" required>
    </div>
  </div>
  <button type="button" id="addWorkBtn">Добавить произведение</button>
  <button type="submit">Опубликовать</button>
</form>

<script>
  // Добавление полей
  document.getElementById('addWorkBtn').addEventListener('click', function() {
    const workList = document.getElementById('workList');
    const newWorkContainer = document.createElement('div');
    newWorkContainer.className = 'work-container';
    newWorkContainer.innerHTML = `
            <input type="text" name="works[]" placeholder="Произведение" required>
            <button type="button" class="remove-btn"></button>
        `;
    workList.appendChild(newWorkContainer);
  });

  document.getElementById('workList').addEventListener('click', function(e) {
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