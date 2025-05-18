<?php
header('Content-Type: application/json');

$nick = $_GET['nick'] ?? '';
$sender = $_GET['sender'] ?? '';

if ($nick === '' || $sender === '') {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap.']);
    exit;
}

// Simpan ke file
$data = ['nick' => $nick, 'sender' => $sender];
file_put_contents('config.json', json_encode($data));

echo json_encode(['success' => true, 'message' => 'Data berhasil diubah.']);
?>