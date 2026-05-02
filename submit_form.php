<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Geçersiz istek.']);
    exit;
}

$name    = trim($_POST['name'] ?? '');
$phone   = trim($_POST['phone'] ?? '');
$email   = trim($_POST['email'] ?? '');
$type    = trim($_POST['type'] ?? '');
$message = trim($_POST['message'] ?? '');
$source  = trim($_POST['source'] ?? 'Ana Sayfa');

if (!$name || !$phone) {
    echo json_encode(['success' => false, 'message' => 'Ad soyad ve telefon zorunludur.']);
    exit;
}

$formsFile = __DIR__ . '/data/forms.json';
$forms = [];
if (file_exists($formsFile)) {
    $content = file_get_contents($formsFile);
    $forms = json_decode($content, true) ?: [];
}

$newForm = [
    'id'      => time() . rand(100, 999),
    'name'    => $name,
    'phone'   => $phone,
    'email'   => $email,
    'type'    => $type,
    'message' => $message,
    'source'  => $source,
    'date'    => date('d.m.Y H:i'),
    'read'    => false
];

array_unshift($forms, $newForm);

file_put_contents($formsFile, json_encode($forms, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => 'Talebiniz alındı! En kısa sürede sizi arayacağız.']);
