<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Пользователь не авторизован']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Проверка на ошибки загрузки
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['error' => 'Ошибка при загрузке файла']);
        exit;
    }

    // Проверка типа файла
    $allowedTypes = ['text/plain', 'application/pdf', 'application/json', 'application/msword'];
    if (!in_array($file['type'], $allowedTypes)) {
        echo json_encode(['error' => 'Недопустимый тип файла']);
        exit;
    }

    // Перемещение файла в папку uploads
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Логика отправки файла в AI API
        $fileContent = file_get_contents($filePath);

        // Пример: отправка файла в ИИ API
        $aiApiUrl = 'https://neuroapi.host/v1/process-file';
        $response = sendFileToAI($aiApiUrl, $fileContent);

        echo json_encode(['success' => true, 'response' => $response]);
    } else {
        echo json_encode(['error' => 'Не удалось сохранить файл']);
    }
    exit;
}

function sendFileToAI($url, $content) {
    // Отправка файла через curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['file_content' => $content]);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
