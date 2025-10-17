-- SQL-cкрипт для создания таблиц
CREATE TABLE responses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  age INT NOT NULL,
  gender ENUM('М','Ж') NOT NULL,
  color VARCHAR(36) NOT NULL
)
