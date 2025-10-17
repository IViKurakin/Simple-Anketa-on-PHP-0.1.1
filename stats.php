<?php
require_once 'config.php';

// Общее количество ответов
$total = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(*) FROM responses"))[0];

// Статистика по полу
$gender_stats = mysqli_query($connect, "SELECT gender, COUNT(*) as count FROM responses GROUP BY gender");

// Статистика по цвету (топ-5)
$color_stats = mysqli_query($connect, "SELECT color, COUNT(*) as count FROM responses GROUP BY color ORDER BY count DESC LIMIT 5");

// Средний возраст
$avg_age = mysqli_fetch_row(mysqli_query($connect, "SELECT AVG(age) FROM responses"))[0];
$avg_age = round($avg_age, 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
</head>
<body>
    <h2>Статистика опроса</h2>

    <p><strong>Всего ответов:</strong> <?= $total ?></p>
    <p><strong>Средний возраст:</strong> <?= $avg_age ?> лет</p>

    <h3>По полу:</h3>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($gender_stats)): ?>
            <li><?= htmlspecialchars($row['gender']) ?>: <?= $row['count'] ?></li>
        <?php endwhile; ?>
    </ul>

    <h3>Топ-5 любимых цветов:</h3>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($color_stats)): ?>
            <li><?= htmlspecialchars($row['color']) ?>: <?= $row['count'] ?></li>
        <?php endwhile; ?>
    </ul>

    <br>
    <a href="index.php">← Вернуться к анкете</a>
</body>
</html>
