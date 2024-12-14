<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Документация - FixIt AI</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css"> <!-- Подключение внешнего CSS -->
</head>
<body>
    <!-- Контейнер для анимации particles.js -->
    <div id="particles-js"></div>

    <!-- Основной контент страницы -->
    <div class="container mt-5">
    <div class="logo-container">
        <!-- Логотип с анимированным градиентом -->
        <a href="index.php" class="project-icon">
            <h1 class="logo-text">FixIt AI</h1>
        </a>
    </div>
        <h1 class="text-center text-white">Документация</h1>
        <ul class="nav nav-tabs justify-content-center" id="docTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="api-tab" data-bs-toggle="tab" data-bs-target="#api" type="button" role="tab" aria-controls="api" aria-selected="true">API</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="usage-tab" data-bs-toggle="tab" data-bs-target="#usage" type="button" role="tab" aria-controls="usage" aria-selected="false">Как пользоваться</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="examples-tab" data-bs-toggle="tab" data-bs-target="#examples" type="button" role="tab" aria-controls="examples" aria-selected="false">Примеры</button>
            </li>
        </ul>
        <div class="tab-content" id="docTabsContent">
            <div class="tab-pane fade show active" id="api" role="tabpanel" aria-labelledby="api-tab">
                <h2>API</h2>
                <p>Документация по использованию API.</p>
            </div>
            <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                <h2>Как пользоваться FixIt AI</h2>
                <p>Добро пожаловать в FixIt AI – ваш надежный помощник в улучшении качества кода и исправлении ошибок с помощью искусственного интеллекта. Ниже приведено пошаговое руководство по использованию всех возможностей нашего инструмента.</p>

                <h3>1. Регистрация и Вход</h3>
                <ol>
                    <li><strong>Регистрация:</strong>
                        <ul>
                            <li>Перейдите на страницу <a href="/register">Регистрации</a>.</li>
                            <li>Заполните форму регистрации, указав ваше имя пользователя, электронную почту и пароль.</li>
                            <li>Нажмите кнопку <em>Зарегистрироваться</em>.</li>
                            <li>После успешной регистрации вы будете автоматически авторизованы и перенаправлены на дашборд.</li>
                        </ul>
                    </li>
                    <li><strong>Вход:</strong>
                        <ul>
                            <li>Перейдите на страницу <a href="/login">Входа</a>.</li>
                            <li>Введите вашу электронную почту и пароль.</li>
                            <li>Нажмите кнопку <em>Войти</em>.</li>
                            <li>После успешного входа вы будете перенаправлены на дашборд.</li>
                        </ul>
                    </li>
                </ol>

                <h3>2. Навигация по Дашборду</h3>
                <p>После входа в систему вы попадете на основной дашборд, где доступны все основные функции FixIt AI:</p>
                <ul>
                    <li><strong>Обзор:</strong> Общая статистика и сводка ваших проектов.</li>
                    <li><strong>Проекты:</strong> Управление вашими проектами, создание новых и просмотр существующих.</li>
                    <li><strong>Чат с ИИ:</strong> Общение с искусственным интеллектом для анализа и улучшения кода.</li>
                    <li><strong>Настройки:</strong> Настройка профиля и предпочтений.</li>
                </ul>

                <h3>3. Создание и Управление Проектами</h3>
                <ol>
                    <li>На дашборде перейдите в раздел <strong>Проекты</strong>.</li>
                    <li>Нажмите кнопку <em>Создать проект</em>.</li>
                    <li>Заполните информацию о проекте, включая название, описание и выберите тип проекта.</li>
                    <li>Нажмите <em>Сохранить</em> для создания нового проекта.</li>
                    <li>Вы можете просматривать, редактировать или удалять ваши проекты в этом разделе.</li>
                </ol>

                <h3>4. Общение с ИИ для Улучшения Кода</h3>
                <ol>
                    <li>Перейдите в раздел <strong>Чат с ИИ</strong> на дашборде.</li>
                    <li>В текстовое поле введите ваш код или опишите проблему, с которой вы столкнулись.</li>
                    <li>Нажмите кнопку <em>Отправить</em>.</li>
                    <li>Искусственный интеллект проанализирует ваш запрос и предоставит рекомендации по улучшению кода или исправлению ошибок.</li>
                    <li>Вы можете продолжать диалог с ИИ для получения более детальных рекомендаций.</li>
                </ol>

                <h3>5. Интеграция с Системами Контроля Версий</h3>
                <p>FixIt AI поддерживает интеграцию с популярными системами контроля версий, такими как GitHub и GitLab. Для настройки интеграции:</p>
                <ol>
                    <li>Перейдите в раздел <strong>Настройки</strong> на дашборде.</li>
                    <li>Выберите вкладку <em>Интеграции</em>.</li>
                    <li>Выберите нужную систему контроля версий и следуйте инструкциям для подключения.</li>
                    <li>После успешной интеграции вы сможете автоматически анализировать коммиты и пулл-реквесты с помощью ИИ.</li>
                </ol>

                <h3>6. Просмотр Истории и Отчетов</h3>
                <p>FixIt AI сохраняет историю ваших взаимодействий и предоставляет подробные отчеты:</p>
                <ul>
                    <li><strong>История:</strong> Просматривайте все ваши запросы к ИИ и полученные ответы.</li>
                    <li><strong>Отчеты:</strong> Генерируйте отчеты о состоянии вашего кода, выявленных ошибках и предложенных улучшениях.</li>
                </ul>

                <h3>7. Настройка Уведомлений</h3>
                <p>Вы можете настроить уведомления, чтобы получать оповещения о важных событиях:</p>
                <ol>
                    <li>Перейдите в раздел <strong>Настройки</strong>.</li>
                    <li>Выберите вкладку <em>Уведомления</em>.</li>
                    <li>Отметьте типы уведомлений, которые вы хотите получать (например, по электронной почте или через push-уведомления).</li>
                    <li>Сохраните изменения.</li>
                </ol>

                <h3>8. Поддержка и Обратная Связь</h3>
                <p>Если у вас возникли вопросы или вы хотите оставить отзыв:</p>
                <ol>
                    <li>Перейдите на страницу <a href="/support">Поддержки</a>.</li>
                    <li>Заполните форму обратной связи или свяжитесь с нашей службой поддержки через предоставленные контакты.</li>
                    <li>Мы ценим ваше мнение и постоянно работаем над улучшением FixIt AI.</li>
                </ol>

                <h3>Полезные Советы</h3>
                <ul>
                    <li>Регулярно обновляйте ваш профиль и настройки для наилучшего опыта использования.</li>
                    <li>Используйте историю запросов для отслеживания прогресса и повторного использования полезных рекомендаций.</li>
                    <li>Интегрируйте FixIt AI с вашими текущими инструментами разработки для максимальной эффективности.</li>
                </ul>

                <p>Мы надеемся, что FixIt AI станет вашим незаменимым помощником в разработке качественного кода!</p>
            </div>
            <div class="tab-pane fade" id="examples" role="tabpanel" aria-labelledby="examples-tab">
                <h2>Примеры</h2>
                <p>Примеры использования чата с ИИ и других возможностей проекта.</p>
            </div>
        </div>
    </div>

    <!-- Скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/granim@2.0.0/dist/granim.min.js"></script>
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

