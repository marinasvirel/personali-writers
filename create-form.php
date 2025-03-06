<form class="info" action="" method="post" enctype="multipart/form-data">
  <span class="info-span"><?= $name_span ?></span>
  <input type="text" name="name" placeholder="Имя" value="<?= $name ?>">
  <span class="info-span"><?= $surname_span ?></span>
  <input type="text" name="surname" placeholder="Фамилия" value="<?= $surname ?>">
  <span class="info-span"><?= $patronymic_span ?></span>
  <input type="text" name="patronymic" placeholder="Отчество" value="<?= $patronymic ?>">
  <span class="info-span"><?= $date_birth_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;рождения:</p>
    <input type="date" name="date-birth" id="date-birth" value="<?= $date_birth ?>">
  </div>
  <span class="info-span"><?= $date_died_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;смерти:</p>
    <input type="date" name="date-died" id="" value="<?= $date_died ?>">
  </div>
  <span class="info-span"><?= $file_span ?></span>
  <div class="file-container">
    <input type="file" id="file" name="file">
    <label for="file" id="for-file">Изображение писателя</label>
  </div>
  <span class="info-span"><?= $biography_span ?></span>
  <textarea name="biography" id="" placeholder="Биография"><?= $biography ?></textarea>
  <div id="workList">
    <span class="info-span"><?= $works_span ?></span>
    <div class="work-container">
      <input type="text" name="works[]" placeholder="Произведение">
    </div>
  </div>
  <button type="button" id="addWorkBtn">Добавить произведение</button>
  <button type="submit" name="public">Опубликовать</button>
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