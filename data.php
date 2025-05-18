<?php
header('Content-Type: application/json');

// Ambil data dari config.json
$configFile = 'config.json';
$config = file_exists($configFile) ? json_decode(file_get_contents($configFile), true) : ['nick' => '', 'sender' => ''];

// Ambil data dari emails.json
$emailFile = 'emails.json';
$emails = file_exists($emailFile) ? json_decode(file_get_contents($emailFile), true) : [];

// Gabungkan semua data
$response = [
    'nick' => $config['nick'] ?? '',
    'sender' => $config['sender'] ?? '',
    'emails' => $emails
];

// Kirim sebagai JSON
echo json_encode($response, JSON_PRETTY_PRINT);
?>
