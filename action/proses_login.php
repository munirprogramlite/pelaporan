<?php
session_start();
require_once '../config/database.php';
require_once '../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header('Location: ../index.php?error=Username+dan+password+harus+diisi');
        exit;
    }

    // Cari user di database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login sukses
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nama'] = $user['nama_lengkap'];
        header('Location: ../views/dashboard.php');
        exit;
    } else {
        header('Location: ../index.php?error=Username+atau+password+salah');
        exit;
    }
} else {
    header('Location: ../index.php');
    exit;
}
?>