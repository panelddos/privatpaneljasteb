<?php
header('Content-Type: application/json');

$email = $_POST['email'] ?? '';
$jumlah = $_POST['jumlahResult'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !is_numeric($jumlah)) {
    echo json_encode(['success' => false, 'message' => 'Input tidak valid.']);
    exit;
}

$file = 'emails.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$data[] = ['email' => $email, 'jumlah' => (int)$jumlah];

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => 'Email berhasil ditambahkan.']);
?>
