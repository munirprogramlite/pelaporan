<?php
session_start();
if (!isset($_SESSION['user_id'])) { header('Location: ../index.php'); exit; }
require_once '../config/database.php';

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Ambil username untuk filtering
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];

$stats = [];
if ($role == '1') {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM laporan WHERE username = ?");
    $stmt->execute([$username]);
    $stats['total'] = $stmt->fetchColumn();
} else {
    $stmt = $pdo->query("SELECT COUNT(*) FROM laporan");
    $stats['total'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    $stats['users'] = $stmt->fetchColumn();
}

$title = 'Dashboard Pelaporan';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <h2>Selamat datang, <?= htmlspecialchars($user['nama_lengkap'] ?? $user['username']) ?>!</h2>
        <p>Anda login sebagai: <strong><?= $role == '1' ? 'Siswa / Pelapor' : 'Administrator' ?></strong></p>
    </div>

    <div class="stats-grid">
        <?php if ($role == '1'): ?>
            <div class="stat-card">
                <h3>Total Laporan Saya</h3>
                <h1 style="margin:0;"><?= $stats['total'] ?></h1>
            </div>
        <?php else: ?>
            <div class="stat-card">
                <h3>Total Laporan Sistem</h3>
                <h1 style="margin:0;"><?= $stats['total'] ?></h1>
            </div>
            <div class="stat-card">
                <h3>Total Pengguna</h3>
                <h1 style="margin:0;"><?= $stats['users'] ?></h1>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>