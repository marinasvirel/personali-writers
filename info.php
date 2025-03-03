<?php
require_once "validation.php";
require_once "db.php";


if ($valid == true) {
  if (isset($_POST['public'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $date_birth = $_POST['date-birth'];
    $date_died = $_POST['date-died'];
    $biography = $_POST['biography'];
    $works = implode('; ', $_POST['works']);

    $query = "INSERT INTO `writers`(`name`, `surname`, `patronymic`, `date-birth`, `date-died`, `file`, `biography`, `works`) VALUES ('$name', '$surname', '$patronymic', '$date_birth', '$date_died', 'file', '$biography', '$works')";
    mysqli_query($link, $query);
  }
}



//var_dump($_POST['date-birth']);
?>
<h2>Информация о писателе</h2>
<form class="info" action="" method="post" enctype="multipart/form-data">
  <span class="info-span"><?= $name_span ?></span>
  <input type="text" name="name" placeholder="Имя" value="<?php if (isset($_POST['name'])) {
                                                            echo $_POST['name'];
                                                          } ?>">
  <span class="info-span"><?= $surname_span ?></span>
  <input type="text" name="surname" placeholder="Фамилия" value="<?php if (isset($_POST['surname'])) {
                                                                    echo $_POST['surname'];
                                                                  } ?>">
  <span class="info-span"><?= $patronymic_span ?></span>
  <input type="text" name="patronymic" placeholder="Отчество" value="<?php if (isset($_POST['patronymic'])) {
                                                                        echo $_POST['patronymic'];
                                                                      } ?>">
  <span class="info-span"><?= $date_birth_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;рождения:</p>
    <input type="date" name="date-birth" id="date-birth" value="<?php if (isset($_POST['date-birth'])) {
                                                                  echo $_POST['date-birth'];
                                                                } ?>">
  </div>
  <span class="info-span"><?= $date_died_span ?></span>
  <div class="date-wrapper">
    <p>Дата&nbsp;смерти:</p>
    <input type="date" name="date-died" id="" value="<?php if (isset($_POST['date-died'])) {
                                                        echo $_POST['date-died'];
                                                      } ?>">
  </div>
  <span class="info-span"><?= $file_span ?></span>
  <div class="file-container">
    <input type="file" id="file" name="file">
    <label for="file" id="for-file">Изображение писателя</label>
  </div>
  <span class="info-span"><?= $biography_span ?></span>
  <textarea name="biography" id="" placeholder="Биография"></textarea>
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