<!-- Файл конфигурации подключения проекта к базе данных -->
<?php
  // Конфигурационные переменные
  $host = 'localhost';
  $login = 'ci120531_p311';
  $password = 'AAbb2233';
  $db_name = 'ci120531_p311';
  // Создание объекта подключения
  $connect = mysqli_connect($host, $login, $password, $db_name);
  // Проверка соединения
  if (!$connect) {
    die('Ошибка подключения: '.mysqli_connect_error();
  }
?>
