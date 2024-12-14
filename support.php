<?php
// support.php

// Обработка формы при отправке
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Получение и валидация данных из формы
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Простая валидация
    $errors = [];

    if (empty($name)) {
        $errors[] = "Имя обязательно.";
    }

    if (empty($email)) {
        $errors[] = "Email обязателен.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неверный формат Email.";
    }

    if (empty($subject)) {
        $errors[] = "Тема обязательна.";
    }

    if (empty($message)) {
        $errors[] = "Сообщение обязательно.";
    }

    if (empty($errors)) {
        // Вставка данных в таблицу tickets
        $stmt = $pdo->prepare("INSERT INTO tickets (name, email, subject, message) VALUES (?, ?, ?, ?)");
        try {
            $stmt->execute([$name, $email, $subject, $message]);
            $success = "Ваш тикет успешно отправлен. Мы свяжемся с вами в ближайшее время.";
        } catch (PDOException $e) {
            $errors[] = "Ошибка при отправке тикета: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поддержка - FixIt AI</title>
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
            <h1 class="text-center">Поддержка</h1>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <form action="support.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?= isset($name) ? htmlspecialchars($name) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Тема</label>
                    <input type="text" class="form-control" id="subject" name="subject" required value="<?= isset($subject) ? htmlspecialchars($subject) : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Сообщение</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required><?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>

    <!-- Скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/granim@2.0.0/dist/granim.min.js"></script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
