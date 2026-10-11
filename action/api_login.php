<?php
// Tidak perlu session_start() jika murni untuk API mobile
require_once '../config/database.php';
require_once '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // 1. Cek jika kosong
    if (empty($username) || empty($password)) {
        echo "kosong";
        exit;
    }

    // 2. Cari user di database menggunakan PDO
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 3. Verifikasi (PENTING: Sesuaikan dengan kondisi database Anda)
    if ($user) {
        // OPSI A: Jika password di database sudah di-hash (Acak)
        if (password_verify($password, $user['password'])) {
            echo "sukses";
        } 
        // OPSI B: Jika password di database masih teks biasa (misal "12345")
        // Hapus komentar pada baris di bawah ini dan matikan Opsi A jika masih tahap testing awal
        /*
        elseif ($password === $user['password']) {
            echo "sukses";
        } 
        */
        else {
            echo "gagal";
        }
    } else {
        echo "gagal"; // Username tidak ditemukan
    }
} else {
    echo "gagal";
}
?>