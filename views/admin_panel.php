<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] == '1') { header('Location: dashboard.php'); exit; }
require_once '../config/database.php';

$stmt = $pdo->query("SELECT * FROM laporan ORDER BY id DESC");
$semua_laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = 'Kelola Laporan';
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="card">
        <h2>Semua Data Laporan</h2>
        <a href="cetak_print.php" target="_blank" class="btn btn-primary">Cetak Rekap Laporan</a>
        <table>
            <tr>
                <th>No</th>
                <th>Pelapor (Username)</th>
                <th>Keterangan</th>
                <th>Waktu</th>
                <th>Foto Bukti</th>
            </tr>
            <?php $no=1; foreach($semua_laporan as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td><?= $row['waktu_lapor'] ?></td>
                <td>
                    <?php if($row['nama_foto']): ?>
                        <a href="../uploads/<?= $row['nama_foto'] ?>" target="_blank">Lihat Foto</a>
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