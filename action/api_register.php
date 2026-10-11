<?php
require_once '../config/database.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$nama = $_POST['nama_lengkap'] ?? '';

if (empty($username) || empty($password)) {
    echo "kosong"; exit;
}

// Cek apakah username sudah dipakai
$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
if ($stmt->fetch()) {
    echo "terdaftar"; exit;
}

// Enkripsi password (wajib agar cocok dengan api_login)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Masukkan ke database (Otomatis role = 1 / Siswa)
$stmt = $pdo->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, '1')");
if ($stmt->execute([$username, $hashed_password, $nama])) {
    echo "sukses";
} else {
    echo "gagal";
}
?>