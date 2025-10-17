<?php
  require_once 'config.php';
  
  $message = '';
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $color = trim($_POST['color']);
    
    // Шаблон SQL-запроса
    $sql = "INSERT INTO responses (name, age, gender, color) VALUES ('$name', '$age', '$gender', '$color')";
    if (mysqli_query($connect, $sql)) {
      $message = 'Спасибо за участие в опросе';
    }
    else {
      $message = 'Ошибка: '.mysqli_error($connect)
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <title></title>
</head>
<body>
  <h2>Анкета пользователя</h2>
  <?php if ($message): ?>
    <p><?= $message  ?></p>
  <?php endif; ?>
  <form action="" method="POST">
    <p>
      <label>Укажите имя:
            <input type="text" name="name" required>
      </label>
    </p>
    <p>
      <label>Укажите возраст:
            <input type="number" name="age" required min="18" max="100">
      </label>
    </p>
    <p>
      <label>Укажите пол:
            <select name="gender" required>
              <option value="">-</option>
              <option value="М">Мужчина</option>
              <option value="Ж">Женщина</option>
            </select>
      </label>
    </p>
    <p>
      <label>Укажите любимый цвет: 
            <input type="text" name="color" required>
      </label>
    </p>
    <button type="submit">Отправить анкету</button>
  </form>
  <br>
  <a href="stats.php">Посмотреть статистику</a>

</body>
</html>
