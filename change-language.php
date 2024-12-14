<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['language'])) {
        $language = $data['language'];
        if (in_array($language, ['en_US', 'ru_RU'])) { // Validate language
            setcookie('language', $language, time() + (86400 * 30), "/"); // 30 days expiry
            echo json_encode(['status' => 'success']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid language']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Language not provided']);
    }
}
?>
