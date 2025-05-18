<?php
header('Content-Type: application/json');

$emailToDelete = $_POST['email'] ?? '';
$file = 'emails.json';

if (!file_exists($file)) {
    echo json_encode(['success' => false, 'message' => 'File tidak ditemukan.']);
    exit;
}

$data = json_decode(file_get_contents($file), true);
$data = array_filter($data, function($entry) use ($emailToDelete) {
    return $entry['email'] !== $emailToDelete;
});

file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));
echo json_encode(['success' => true, 'message' => 'Email berhasil dihapus.']);
?>