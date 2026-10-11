<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $nama = $_POST['nama_lengkap'] ?? '';
    $password = $_POST['password'] ?? '';
    $divisi = $_POST['divisi_kelas'] ?? '';

    // Validasi sederhana
    if (empty($username) || empty($nama) || empty($password)) {
        header('Location: ../register.php?error=Semua+field+wajib+diisi');
        exit;
    }

    // Cek username unik
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        header('Location: ../register.php?error=Username+sudah+digunakan');
        exit;
    }

    // Hash password
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    // Insert user (role default 1)
    $sql = "INSERT INTO users (username, password, role, nama_lengkap, divisi_kelas) 
            VALUES (?, ?, '1', ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $hashed, $nama, $divisi]);

    header('Location: ../index.php?success=Registrasi+berhasil,+silakan+login');
    exit;
} else {
    header('Location: ../register.php');
    exit;
}
?>