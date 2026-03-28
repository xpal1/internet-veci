<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Povolena je iba metoda POST.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$expectedToken = 'zmen-si-token';
$token = (string)($_POST['token'] ?? ($_SERVER['HTTP_X_API_TOKEN'] ?? ''));

if (!hash_equals($expectedToken, $token)) {
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'Neplatny token.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$tempInput = $_POST['temperature'] ?? ($_POST['temp'] ?? null);

if ($tempInput === null) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Chyba parameter temperature.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$tempNormalized = str_replace(',', '.', trim((string)$tempInput));

if (!is_numeric($tempNormalized)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Teplota musi byt cislo.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$temperature = (float)$tempNormalized;

if ($temperature < -50 || $temperature > 120) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Teplota je mimo rozumny rozsah.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$date = trim((string)($_POST['date'] ?? date('Y-m-d')));
$time = trim((string)($_POST['time'] ?? date('H:i:s')));

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Datum musi mat format YYYY-MM-DD.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

if (!preg_match('/^\d{2}:\d{2}:\d{2}$/', $time)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Cas musi mat format HH:MM:SS.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$temperatureString = rtrim(rtrim(number_format($temperature, 2, '.', ''), '0'), '.');
$line = sprintf("%s %s %s\n", $temperatureString, $date, $time);
$dataFile = dirname(__DIR__) . '/data.txt';

if (@file_put_contents($dataFile, $line, FILE_APPEND | LOCK_EX) === false) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Nepodarilo sa ulozit data.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode([
    'status' => 'ok',
    'saved_to' => 'data.txt',
], JSON_UNESCAPED_UNICODE);
