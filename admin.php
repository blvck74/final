<?php
// admin.php

// Подключение к базе данных
$host = 'localhost';      // Адрес базы данных
$dbname = 'fixit';        // Имя базы данных
$username = 'admin';      // Имя пользователя
$password = 'KoStYA8BesTBER';           // Пароль

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Установка режима ошибок PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка изменения статуса тикета
if (isset($_GET['action']) && $_GET['action'] == 'close' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("UPDATE tickets SET status = 'Closed' WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: admin.php");
    exit();
}

// Получение всех тикетов
$stmt = $pdo->prepare("SELECT * FROM tickets ORDER BY created_at DESC");
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка - FixIt AI</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <!-- Контейнер для анимации particles.js -->
    <div id="particles-js"></div>

    <!-- Контейнер для логотипа с анимированным текстом -->
    <div class="logo-container">
        <!-- Логотип с анимированным градиентом -->
        <a href="index.php" class="project-icon">
            <h1 class="logo-text">FixIt AI</h1>
        </a>
    </div>


    <!-- Основной контент страницы -->
    <div class="container mt-5">
        <div class="text-panel">
            <h1 class="text-center">Административная Панель</h1>
            <table class="table table-striped table-bordered mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Тема</th>
                        <th>Сообщение</th>
                        <th>Статус</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($tickets) > 0): ?>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket['id']) ?></td>
                                <td><?= htmlspecialchars($ticket['name']) ?></td>
                                <td><?= htmlspecialchars($ticket['email']) ?></td>
                                <td><?= htmlspecialchars($ticket['subject']) ?></td>
                                <td><?= nl2br(htmlspecialchars($ticket['message'])) ?></td>
                                <td>
                                    <?php if ($ticket['status'] == 'Open'): ?>
                                        <span class="badge bg-success">Открыт</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Закрыт</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($ticket['created_at']) ?></td>
                                <td>
                                    <?php if ($ticket['status'] == 'Open'): ?>
                                        <a href="admin.php?action=close&id=<?= $ticket['id'] ?>" class="btn btn-sm btn-warning">Закрыть</a>
                                    <?php else: ?>
                                        <!-- Можно добавить кнопку для открытия тикета снова, если необходимо -->
                                        <span class="text-muted">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Тикетов нет.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/granim@2.0.0/dist/granim.min.js"></script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
