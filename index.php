<?php
// Отладка (отключите на боевом сервере)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная - FixIt AI</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/github.min.css"> <!-- Тема для highlight.js -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="icon" href="assets/favicon.ico">
</head>
<body>
    <div id="vanta-background" style="position: fixed; top:0; left:0; width:100%; height:100%; z-index:-1;"></div>

    <!-- Прозрачная шапка -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: transparent !important;">
        <div class="container">
            <div class="logo-container">
                <!-- Логотип с анимированным градиентом -->
                <a href="index.php" class="project-icon">
                    <h1 class="logo-text">FixIt AI</h1>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-fixit btn-fixit-primary" href="about.php">О проекте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-fixit btn-fixit-primary" href="documentation.php">Документация</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-fixit btn-fixit-primary ms-3" href="support.php">
                            <i class="fas fa-life-ring me-2"></i> Поддержка
                        </a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link btn-fixit btn-fixit-primary" href="dashboard.php">Личный кабинет</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-fixit btn-fixit-danger" href="logout.php">
                                <i class="fas fa-sign-out-alt me-2"></i> Выход
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-fixit btn-fixit-login" href="login.php">
                                <i class="fas fa-sign-in-alt me-2"></i> Войти
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-fixit btn-fixit-success" href="register.php">
                                <i class="fas fa-user-plus me-2"></i> Регистрация
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Главный баннер -->
    <header class="text-white py-5" style="background: transparent;">
        <div class="container text-center">
            <h1>Добро пожаловать в FixIt AI!</h1>
            <p class="lead">Инструмент для разработчиков, упрощающий создание и отладку кода с поддержкой ИИ.</p>
            <a href="dashboard.php" class="btn btn-fixit btn-fixit-primary mt-3">Попробовать сейчас</a>
        </div>
    </header>

    <!-- Ключевые возможности -->
    <section class="py-5" style="background: rgba(0,0,0,0.5); color: #fff;">
        <div class="container">
            <h2 class="text-center mb-4">Ключевые возможности</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <i class="fas fa-bolt fa-3x text-primary mb-3"></i>
                    <h4>Быстрая работа</h4>
                    <p>Мгновенная обработка запросов и быстрый интерфейс упрощают вашу разработку.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-lock fa-3x text-primary mb-3"></i>
                    <h4>Безопасность</h4>
                    <p>Ваши данные надежно хранятся и защищены.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-brain fa-3x text-primary mb-3"></i>
                    <h4>Интеллектуальная поддержка</h4>
                    <p>ИИ-ассистент помогает решать проблемы и оптимизировать ваш код.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- О нас -->
    <section class="py-5" style="background: rgba(0,0,0,0.5); color: #fff;">
        <div class="container">
            <h2 class="text-center mb-4">О нас</h2>
            <p class="text-center mb-4">Наш проект создан для разработчиков, фрилансеров и команд. Предоставляем удобный интерфейс, интеллектуальные подсказки и интеграцию с популярными инструментами.</p>
        </div>
    </section>

    <!-- Сценарии использования -->
    <section class="py-5" style="background: rgba(0,0,0,0.5); color: #fff;">
        <div class="container">
            <h2 class="text-center mb-4">Сценарии использования</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <h4>Фрилансеры и индивидуальные разработчики</h4>
                    <p>Экспериментируйте с кодом, тестируйте API и библиотеки, получайте советы от ИИ.</p>
                </div>
                <div class="col-md-4">
                    <h4>Команды и стартапы</h4>
                    <p>Повышайте качество кода, сокращайте время на отладку, храните историю чатов и решений.</p>
                </div>
                <div class="col-md-4">
                    <h4>Учебные цели</h4>
                    <p>Анализируйте примеры кода, улучшайте навыки программирования, получая подсказки от ИИ.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Пример форматирования кода -->
    <section class="py-5" style="background: rgba(0,0,0,0.5); color: #fff;">
        <div class="container">
            <h2 class="text-center mb-4">Пример форматирования кода</h2>
            <p class="text-center mb-4">ИИ подсвечивает синтаксис и форматирует код, помогая лучше понимать примеры.</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <pre><code class="language-javascript">
// Пример кода JavaScript
function helloWorld() {
    console.log("Hello, World!");
}
helloWorld();
                    </code></pre>
                </div>
            </div>
        </div>
    </section>

    <!-- Отзывы -->
    <section class="py-5" style="background: rgba(0,0,0,0.5); color: #fff;">
        <div class="container">
            <h2 class="text-center mb-4">Отзывы</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-3 rounded shadow-sm" style="background: rgba(255,255,255,0.9); color: #000;">
                        <p>"Отличный инструмент! Помог сократить время на отладку кода вдвое."</p>
                        <p class="text-end"><strong>— Алексей, фрилансер</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded shadow-sm" style="background: rgba(255,255,255,0.9); color: #000;">
                        <p>"Интеграция с ИИ удобна. Получаю подсказки прямо в процессе работы."</p>
                        <p class="text-end"><strong>— Мария, CTO стартапа</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded shadow-sm" style="background: rgba(255,255,255,0.9); color: #000;">
                        <p>"Я студент, и этот инструмент помог понять код и научиться новому."</p>
                        <p class="text-end"><strong>— Иван, студент-программист</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Подвал (прозрачный) -->
    <footer class="text-white py-3 mt-4" style="background: transparent;">
        <div class="container text-center">
            <p>&copy; 2024 FixIT AI. Все права защищены.</p>
            <p><a href="https://github.com/blvck74/mainsait" class="text-white" target="_blank" rel="noopener">Исходный код на GitHub</a></p>
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/highlight.min.js"></script>
    <script src="assets/js/three.r134.min.js"></script>
    <script src="assets/js/vanta.net.min.js"></script>
    <script>
        $(document).ready(function() {
            // Подсветка кода
            $('pre code').each(function(i, block) {
                hljs.highlightElement(block);
            });

            // Инициализация Vanta.js
            VANTA.NET({
                el: "#vanta-background",
                mouseControls: true,
                touchControls: true,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                scale: 1.00,
                scaleMobile: 1.00,
                points: 12.00,
                maxDistance: 28.00
            });
        });
    </script>
</body>
</html>
