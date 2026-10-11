<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != '1') { header('Location: dashboard.php'); exit; }
require_once '../config/database.php';

$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$username = $stmt->fetchColumn();

$stmt = $pdo->prepare("SELECT * FROM laporan WHERE username = ? ORDER BY id DESC");
$stmt->execute([$username]);
$riwayat = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = 'Riwayat Laporan';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <h2>Riwayat Laporan Saya</h2>
        <table>
            <tr>
                <th>Waktu</th>
                <th>Keterangan</th>
                <th>Foto</th>
            </tr>
            <?php foreach($riwayat as $row): ?>
            <tr>
                <td><?= $row['waktu_lapor'] ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td>
                    <?php if($row['nama_foto']): ?>
                        <img src="../uploads/<?= $row['nama_foto'] ?>" width="100">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>