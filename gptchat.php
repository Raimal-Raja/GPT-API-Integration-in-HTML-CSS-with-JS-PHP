<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

function fail_request($status, $message) {
    http_response_code($status);
    echo json_encode(['error' => $message]);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Allow: POST');
    fail_request(405, 'Method not allowed');
}
$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input) || !isset($input['message']) || !is_string($input['message'])
        || trim($input['message']) === '' || strlen($input['message']) > 10000) {
    fail_request(400, 'Provide a non-empty message of at most 10000 bytes');
}
if (OPENAI_API_KEY === '' || MODEL === '') {
    fail_request(503, 'Set OPENAI_API_KEY and OPENAI_MODEL in the server environment');
}
if (!function_exists('curl_init')) {
    fail_request(503, 'The PHP cURL extension is required');
}

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_POSTFIELDS => json_encode([
        'model' => MODEL,
        'messages' => [['role' => 'user', 'content' => $input['message']]],
        'max_completion_tokens' => MAX_TOKENS,
    ]),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . OPENAI_API_KEY,
    ],
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($response === false || $status < 200 || $status >= 300) {
    fail_request(502, 'The upstream chat request failed; check server configuration and account access');
}
$data = json_decode($response, true);
$text = $data['choices'][0]['message']['content'] ?? null;
if (!is_string($text)) {
    fail_request(502, 'The upstream response did not contain text');
}
// Preserve the frontend's original choices[0].text response contract.
echo json_encode(['choices' => [['text' => $text]]]);
